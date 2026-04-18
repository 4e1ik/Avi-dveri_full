(function () {
    'use strict';

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    var root = document.querySelector('.home-benefits-marquee');
    if (!root) {
        return;
    }

    var track = root.querySelector('.home-benefits-marquee__track');
    var group = root.querySelector('.home-benefits-marquee__group');
    if (!track || !group) {
        return;
    }

    var loopWidth = 0;
    var offset = 0;
    var dragging = false;
    var pointerStartX = 0;
    var offsetAtDragStart = 0;
    var pointerOverRoot = false;
    var lastTime = performance.now();
    var SECONDS_PER_LOOP = 45;

    function measure() {
        loopWidth = group.getBoundingClientRect().width;
    }

    function normalizeOffset() {
        if (loopWidth <= 0) {
            return;
        }
        while (offset <= -loopWidth) {
            offset += loopWidth;
        }
        while (offset > 0) {
            offset -= loopWidth;
        }
    }

    function applyTransform() {
        track.style.transform = 'translate3d(' + offset + 'px,0,0)';
    }

    function frame(now) {
        var dt = Math.min((now - lastTime) / 1000, 0.064);
        lastTime = now;

        if (loopWidth > 0 && !dragging && !pointerOverRoot) {
            offset -= (loopWidth / SECONDS_PER_LOOP) * dt;
            normalizeOffset();
        }

        applyTransform();
        requestAnimationFrame(frame);
    }

    function onPointerDown(e) {
        if (e.pointerType === 'mouse' && e.button !== 0) {
            return;
        }
        dragging = true;
        pointerStartX = e.clientX;
        offsetAtDragStart = offset;
        track.style.cursor = 'grabbing';
        try {
            track.setPointerCapture(e.pointerId);
        } catch (err) {}
    }

    function onPointerMove(e) {
        if (!dragging) {
            return;
        }
        offset = offsetAtDragStart + (e.clientX - pointerStartX);
        normalizeOffset();
        applyTransform();
    }

    function onPointerUp(e) {
        if (!dragging) {
            return;
        }
        dragging = false;
        track.style.cursor = 'grab';
        normalizeOffset();
        applyTransform();
        try {
            track.releasePointerCapture(e.pointerId);
        } catch (err) {}
    }

    measure();
    window.addEventListener('resize', function () {
        measure();
        normalizeOffset();
        applyTransform();
    });

    if (typeof ResizeObserver !== 'undefined') {
        var ro = new ResizeObserver(function () {
            measure();
            normalizeOffset();
            applyTransform();
        });
        ro.observe(group);
    }

    track.style.cursor = 'grab';
    track.addEventListener('pointerdown', onPointerDown);
    track.addEventListener('pointermove', onPointerMove);
    track.addEventListener('pointerup', onPointerUp);
    track.addEventListener('pointercancel', onPointerUp);

    root.addEventListener('pointerenter', function () {
        pointerOverRoot = true;
    });
    root.addEventListener('pointerleave', function () {
        pointerOverRoot = false;
    });

    track.addEventListener('dragstart', function (e) {
        e.preventDefault();
    });

    requestAnimationFrame(frame);
})();
