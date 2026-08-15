# Graph Report - .  (2026-08-10)

## Corpus Check
- 330 files · ~62,626 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 1155 nodes · 1659 edges · 231 communities (188 shown, 43 thin omitted)
- Extraction: 95% EXTRACTED · 5% INFERRED · 0% AMBIGUOUS · INFERRED: 87 edges (avg confidence: 0.8)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- Breeze Auth Controllers
- Catalog Filter & Doors
- User Auth & Testing
- Manufacturer DTOs Admin
- Product Filter Pipeline
- Catalog API DTOs
- Product Meta Tags
- Reviews Management
- WebP Image Conversion
- Mail Feedback Forms
- Docker & Filter API Docs
- Middleware & Livewire UI
- Admin Catalog Controllers
- HTTP Form Requests
- Admin Product CRUD
- Product Repository Layer
- Promotions & Product Service
- Product Create Update DTOs
- Composer Package Metadata
- Composer Lifecycle Scripts
- Admin Entrance Door Create
- Admin Interior Door Create
- Admin Entrance Door Edit
- Admin Interior Door Edit
- Admin Meta Pages
- Product Tags Admin
- App Service Providers
- Composer Autoload Paths
- Composer Runtime Deps
- Composer Dev Dependencies
- Image Save Service
- Slug Generation Helpers
- User Registration Flow
- Door Fitting Color Helpers
- Login Auth Request
- User Factory Testing
- Composer Plugin Config
- Storefront Product Page
- Admin Fitting Create
- Admin Fitting Edit
- Kernel
- Handler / Throwable
- includes.avi-dveri.home benefits
- apartment doors.blade
- entrance doors.blade
- street doors.blade
- thermal break doors.blade
- eco veneer doors.blade
- enamel doors.blade
- hidden doors.blade
- interior doors.blade
- solid doors.blade
- fittings.blade
- CreateManufacturerRequest
- EventServiceProvider
- eximer doors.blade
- flex enamel doors.blade
- mdf doors.blade
- mdf hdf doors.blade
- polypropylene doors.blade
- solid mdf doors.blade
- economy fittings.blade
- premium fittings.blade
- standard fittings.blade
- products.blade
- TrustHosts
- DoorRequest
- FittingRequest
- StoreTagRequest
- AuthServiceProvider
- ExampleTest
- profile.partials.delete-user-form
- create.blade
- edit.blade
- index door.blade
- index fitting.blade
- index general.blade
- ProductFilterDTO
- Kernel
- EncryptCookies
- PreventRequestsDuringMaintenance
- TrimStrings
- TrustProxies
- ValidateSignature
- VerifyCsrfToken
- autoload-dev
- keywords
- CreatesApplication
- includes.avi-dveri.promotions tabs
- show.blade
- avi-dveri.admin.partials.validation errors
- includes.avi-dveri.callback-form-fields
- includes.avi-dveri.product availability styles
- layouts.navigation
- Google site verification Yandex site
- page edit.blade
- product edit.blade
- create.blade
- edit.blade
- contacts.blade
- feedback-form.blade
- product card images.blade
- search.blade

## God Nodes (most connected - your core abstractions)
1. `Controller` - 57 edges
2. `Product` - 53 edges
3. `MetaTag` - 30 edges
4. `ProductService` - 30 edges
5. `User` - 26 edges
6. `FilterRequest` - 25 edges
7. `ProductRepository` - 24 edges
8. `DoorController` - 23 edges
9. `Manufacturer` - 23 edges
10. `TestCase` - 19 edges

## Surprising Connections (you probably didn't know these)
- `Catalog query param disallows` --semantically_similar_to--> `Filter API v2`  [INFERRED] [semantically similar]
  public/robots.txt → docs/filter-api-v2.md
- `up()` --calls--> `Product`  [INFERRED]
  database/migrations/2026_03_10_120000_add_slug_to_products_table.php → app/Models/Product.php
- `up()` --calls--> `Product`  [INFERRED]
  database/migrations/2026_03_14_110247_add_slug_to_products_table.php → app/Models/Product.php
- `Laravel paginator` --conceptually_related_to--> `Laravel`  [INFERRED]
  docs/filter-api-v2.md → README.md
- `php-fpm` --conceptually_related_to--> `Laravel`  [INFERRED]
  docker-compose.yml → README.md

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Local Docker application stack** — docker_compose_web, docker_compose_php_fpm, docker_compose_mysql, docker_compose_redis [EXTRACTED 1.00]
- **Filter API v2 response composition** — docs_filter_api_v2_filter_api_v2, docs_filter_api_v2_apiresponse, docs_filter_api_v2_laravel_paginator, docs_filter_api_v2_product_dto [EXTRACTED 1.00]

## Communities (231 total, 43 thin omitted)

### Community 0 - "Breeze Auth Controllers"
Cohesion: 0.06
Nodes (27): AuthenticatedSessionController, ConfirmablePasswordController, EmailVerificationNotificationController, EmailVerificationPromptController, NewPasswordController, PasswordController, PasswordResetLinkController, RegisteredUserController (+19 more)

### Community 1 - "Catalog Filter & Doors"
Cohesion: 0.09
Nodes (8): FilterDTO, DoorController, FittingController, MainController, FilterRequest, MetaTag, FilterService, Illuminate\Database\Eloquent\Model

### Community 2 - "User Auth & Testing"
Cohesion: 0.08
Nodes (16): User, CreatesApplication, Illuminate\Foundation\Auth\User, Illuminate\Foundation\Testing\RefreshDatabase, Illuminate\Foundation\Testing\TestCase, Illuminate\Notifications\Notifiable, Laravel\Sanctum\HasApiTokens, AuthenticationTest (+8 more)

### Community 3 - "Manufacturer DTOs Admin"
Cohesion: 0.09
Nodes (12): CreateManufacturerDTO, DestroyManufacturerDTO, UpdateManufacturerDTO, ManufacturerController, UpdateManufacturerRequest, Manufacturer, ManufacturerRepository, ManufacturerService (+4 more)

### Community 4 - "Product Filter Pipeline"
Cohesion: 0.09
Nodes (11): AbstractFilter, apply(), ProductFilter, Door, Fitting, scopeFilter(), DoorRepository, FittingRepository (+3 more)

### Community 5 - "Catalog API DTOs"
Cohesion: 0.08
Nodes (12): CatalogProductDTO, GlobalFilterDTO, ApiResponse, ProductUrlHelper, ManufacturerController, FilterController, FilterV2Request, CatalogFilterV2Service (+4 more)

### Community 6 - "Product Meta Tags"
Cohesion: 0.07
Nodes (14): GetMetaTagsProductDTO, UpdateMetaTagsProductDTO, MetaTagsProductController, SitemapController, MetaTemplateProductRequest, Search, MetaTemplateProduct, MetaTagsProductRepository (+6 more)

### Community 7 - "Reviews Management"
Cohesion: 0.09
Nodes (9): ReviewController, ReviewController, StoreReviewRequest, Review, ReviewService, DatabaseSeeder, ReviewSeeder, TagSeeder (+1 more)

### Community 8 - "WebP Image Conversion"
Cohesion: 0.11
Nodes (11): ConvertAviDveriStaticImagesToWebpCommand, MigrateAllImagesToWebpCommand, MigrateStorageImagesToWebpCommand, ConvertUploadedImageToWebpHelper, Image, ImageRepository, Illuminate\Console\Command, Illuminate\Database\Eloquent\Relations\MorphTo (+3 more)

### Community 9 - "Mail Feedback Forms"
Cohesion: 0.12
Nodes (8): MailController, MailRequest, FeedbackMail, Illuminate\Bus\Queueable, Illuminate\Mail\Mailable, Illuminate\Mail\Mailables\Content, Illuminate\Mail\Mailables\Envelope, Illuminate\Queue\SerializesModels

### Community 10 - "Docker & Filter API Docs"
Cohesion: 0.12
Nodes (18): mysql (MariaDB 10.3), nginx:latest, php-fpm, redis, web (nginx), ApiResponse, POST /api/filter/v2, Filter API v2 (+10 more)

### Community 11 - "Middleware & Livewire UI"
Cohesion: 0.17
Nodes (7): RedirectIfAuthenticated, AppLayout, FeedbackForm, GuestLayout, Closure, Illuminate\View\Component, Symfony\Component\HttpFoundation\Response

### Community 13 - "HTTP Form Requests"
Cohesion: 0.19
Nodes (4): ImageRequest, MetaTagRequest, ProfileUpdateRequest, Illuminate\Foundation\Http\FormRequest

### Community 15 - "Product Repository Layer"
Cohesion: 0.21
Nodes (3): ProductRepository, Illuminate\Pagination\LengthAwarePaginator, Illuminate\Support\Collection

### Community 18 - "Composer Package Metadata"
Cohesion: 0.20
Nodes (9): description, extra, laravel, dont-discover, license, minimum-stability, name, prefer-stable (+1 more)

### Community 19 - "Composer Lifecycle Scripts"
Cohesion: 0.20
Nodes (10): scripts, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, Illuminate\\Foundation\\ComposerScripts::postAutoloadDump, @php artisan key:generate --ansi, @php artisan package:discover --ansi (+2 more)

### Community 20 - "Admin Entrance Door Create"
Cohesion: 0.20
Nodes (9): avi-dveri.admin.partials.door_attrs_checkboxes, avi-dveri.admin.partials.entrance_door_material_select, avi-dveri.admin.partials.image_upload_limit_notice, avi-dveri.admin.partials.product_availability_radios, avi-dveri.admin.partials.product_brand_select, avi-dveri.admin.partials.product_label_checkboxes, avi-dveri.admin.partials.product_size_row_actions, avi-dveri.admin.partials.product_tag_checkboxes (+1 more)

### Community 21 - "Admin Interior Door Create"
Cohesion: 0.20
Nodes (9): avi-dveri.admin.partials.door_attrs_checkboxes, avi-dveri.admin.partials.image_upload_limit_notice, avi-dveri.admin.partials.interior_door_material_select, avi-dveri.admin.partials.product_availability_radios, avi-dveri.admin.partials.product_brand_select, avi-dveri.admin.partials.product_label_checkboxes, avi-dveri.admin.partials.product_size_row_actions, avi-dveri.admin.partials.product_tag_checkboxes (+1 more)

### Community 22 - "Admin Entrance Door Edit"
Cohesion: 0.20
Nodes (9): avi-dveri.admin.partials.door_attrs_checkboxes, avi-dveri.admin.partials.entrance_door_material_select, avi-dveri.admin.partials.image_upload_limit_notice, avi-dveri.admin.partials.product_availability_radios, avi-dveri.admin.partials.product_brand_select, avi-dveri.admin.partials.product_label_checkboxes, avi-dveri.admin.partials.product_size_row_actions, avi-dveri.admin.partials.product_tag_checkboxes (+1 more)

### Community 23 - "Admin Interior Door Edit"
Cohesion: 0.20
Nodes (9): avi-dveri.admin.partials.door_attrs_checkboxes, avi-dveri.admin.partials.image_upload_limit_notice, avi-dveri.admin.partials.interior_door_material_select, avi-dveri.admin.partials.product_availability_radios, avi-dveri.admin.partials.product_brand_select, avi-dveri.admin.partials.product_label_checkboxes, avi-dveri.admin.partials.product_size_row_actions, avi-dveri.admin.partials.product_tag_checkboxes (+1 more)

### Community 26 - "App Service Providers"
Cohesion: 0.28
Nodes (3): AppServiceProvider, BroadcastServiceProvider, Illuminate\Support\ServiceProvider

### Community 27 - "Composer Autoload Paths"
Cohesion: 0.22
Nodes (9): autoload, files, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\, app/Helpers/add_doors_colors.php, app/Helpers/add_fittings_colors.php (+1 more)

### Community 28 - "Composer Runtime Deps"
Cohesion: 0.22
Nodes (9): require, guzzlehttp/guzzle, intervention/image, laravel/breeze, laravel/framework, laravel/sanctum, laravel/tinker, livewire/livewire (+1 more)

### Community 29 - "Composer Dev Dependencies"
Cohesion: 0.22
Nodes (9): require-dev, barryvdh/laravel-debugbar, fakerphp/faker, laravel/pint, laravel/sail, mockery/mockery, nunomaduro/collision, phpunit/phpunit (+1 more)

### Community 35 - "User Factory Testing"
Cohesion: 0.38
Nodes (3): UserFactory, Illuminate\Database\Eloquent\Factories\Factory, static

### Community 36 - "Composer Plugin Config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 37 - "Storefront Product Page"
Cohesion: 0.29
Nodes (6): includes.avi-dveri.product_breadcrumbs, includes.avi-dveri.product_category, includes.avi-dveri.product_card_details, includes.avi-dveri.product_card_images, includes.avi-dveri.product_card_labels, includes.avi-dveri.product_route

### Community 38 - "Admin Fitting Create"
Cohesion: 0.29
Nodes (6): avi-dveri.admin.partials.image_upload_limit_notice, avi-dveri.admin.partials.product_availability_radios, avi-dveri.admin.partials.product_brand_select, avi-dveri.admin.partials.product_label_checkboxes, avi-dveri.admin.partials.product_tag_checkboxes, avi-dveri.admin.partials.slug_autofill

### Community 39 - "Admin Fitting Edit"
Cohesion: 0.29
Nodes (6): avi-dveri.admin.partials.image_upload_limit_notice, avi-dveri.admin.partials.product_availability_radios, avi-dveri.admin.partials.product_brand_select, avi-dveri.admin.partials.product_label_checkboxes, avi-dveri.admin.partials.product_tag_checkboxes, avi-dveri.admin.partials.slug_autofill

### Community 40 - "Kernel"
Cohesion: 0.40
Nodes (3): Kernel, Illuminate\Console\Scheduling\Schedule, Illuminate\Foundation\Console\Kernel

### Community 41 - "Handler / Throwable"
Cohesion: 0.40
Nodes (3): Handler, Illuminate\Foundation\Exceptions\Handler, Throwable

### Community 42 - "includes.avi-dveri.home benefits"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.home_benefits, includes.avi-dveri.product_card_details, includes.avi-dveri.product_card_images, includes.avi-dveri.product_card_labels, includes.avi-dveri.product_route

### Community 43 - "apartment doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 44 - "entrance doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 45 - "street doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 46 - "thermal break doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 47 - "eco veneer doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 48 - "enamel doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 49 - "hidden doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 50 - "interior doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 51 - "solid doors.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 52 - "fittings.blade"
Cohesion: 0.33
Nodes (5): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.faq, includes.avi-dveri.products

### Community 55 - "eximer doors.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 56 - "flex enamel doors.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 57 - "mdf doors.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 58 - "mdf hdf doors.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 59 - "polypropylene doors.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 60 - "solid mdf doors.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 61 - "economy fittings.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 62 - "premium fittings.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 63 - "standard fittings.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.aside_catalog, includes.avi-dveri.aside_filter, includes.avi-dveri.catalog_tags, includes.avi-dveri.products

### Community 64 - "products.blade"
Cohesion: 0.40
Nodes (4): includes.avi-dveri.product_card_details, includes.avi-dveri.product_card_images, includes.avi-dveri.product_card_labels, includes.avi-dveri.product_route

### Community 71 - "profile.partials.delete-user-form"
Cohesion: 0.50
Nodes (3): profile.partials.delete-user-form, profile.partials.update-password-form, profile.partials.update-profile-information-form

### Community 72 - "create.blade"
Cohesion: 0.50
Nodes (3): avi-dveri.admin.manufacturers._alerts, avi-dveri.admin.manufacturers._tabs, avi-dveri.admin.partials.slug_autofill

### Community 73 - "edit.blade"
Cohesion: 0.50
Nodes (3): avi-dveri.admin.manufacturers._alerts, avi-dveri.admin.manufacturers._tabs, avi-dveri.admin.partials.slug_autofill

### Community 74 - "index door.blade"
Cohesion: 0.50
Nodes (3): avi-dveri.admin.manufacturers._alerts, avi-dveri.admin.manufacturers._table, avi-dveri.admin.manufacturers._tabs

### Community 75 - "index fitting.blade"
Cohesion: 0.50
Nodes (3): avi-dveri.admin.manufacturers._alerts, avi-dveri.admin.manufacturers._table, avi-dveri.admin.manufacturers._tabs

### Community 76 - "index general.blade"
Cohesion: 0.50
Nodes (3): avi-dveri.admin.manufacturers._alerts, avi-dveri.admin.manufacturers._table, avi-dveri.admin.manufacturers._tabs

### Community 85 - "autoload-dev"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

### Community 86 - "keywords"
Cohesion: 0.67
Nodes (3): keywords, framework, laravel

## Knowledge Gaps
- **235 isolated node(s):** `name`, `type`, `description`, `laravel`, `framework` (+230 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **43 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Controller` connect `Breeze Auth Controllers` to `User Registration Flow`, `Catalog Filter & Doors`, `Manufacturer DTOs Admin`, `Catalog API DTOs`, `Product Meta Tags`, `Reviews Management`, `Mail Feedback Forms`, `Admin Catalog Controllers`, `Admin Product CRUD`, `Promotions & Product Service`, `Product Create Update DTOs`?**
  _High betweenness centrality (0.075) - this node is a cross-community bridge._
- **Why does `Product` connect `Admin Catalog Controllers` to `Breeze Auth Controllers`, `Door Fitting Color Helpers`, `Catalog Filter & Doors`, `Product Filter Pipeline`, `Catalog API DTOs`, `Product Meta Tags`, `Reviews Management`, `WebP Image Conversion`, `Admin Product CRUD`, `Product Repository Layer`, `Promotions & Product Service`, `Product Create Update DTOs`, `Image Save Service`, `Slug Generation Helpers`?**
  _High betweenness centrality (0.050) - this node is a cross-community bridge._
- **Why does `Image` connect `WebP Image Conversion` to `Catalog Filter & Doors`, `Product Filter Pipeline`, `Image Save Service`?**
  _High betweenness centrality (0.018) - this node is a cross-community bridge._
- **Are the 12 inferred relationships involving `Product` (e.g. with `.entrance_doors()` and `.fittings()`) actually correct?**
  _`Product` has 12 INFERRED edges - model-reasoned connections that need verification._
- **What connects `name`, `type`, `description` to the rest of the system?**
  _235 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Breeze Auth Controllers` be split into smaller, more focused modules?**
  _Cohesion score 0.05694586312563841 - nodes in this community are weakly interconnected._
- **Should `Catalog Filter & Doors` be split into smaller, more focused modules?**
  _Cohesion score 0.08653061224489796 - nodes in this community are weakly interconnected._