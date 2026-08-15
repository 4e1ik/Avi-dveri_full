# Graphify — установка и обновление

Knowledge graph для AI-ассистента (Cursor) на проекте **Avi-dveri_full**.

Ставить на **хост** (macOS/Linux), **не в Docker**-контейнер PHP.

---

## Требования

- Cursor
- Python **3.10+** (системный Python 3.9 на macOS не подходит)
- Клон репозитория проекта

Проверка:

```bash
python3 --version
```

Если версия ниже 3.10:

```bash
brew install python@3.12
```

---

## 1. Установка CLI (один раз на машине)

```bash
curl -LsSf https://astral.sh/uv/install.sh | sh
source $HOME/.local/bin/env

uv tool install graphifyy --python 3.12
```

Проверка:

```bash
graphify --help
```

Если `uv` или `graphify` не находятся — откройте новый терминал или снова выполните:

```bash
source $HOME/.local/bin/env
```

Альтернатива без uv:

```bash
brew install pipx
pipx ensurepath
pipx install graphifyy --python python3.12
```

Официальный пакет на PyPI: **`graphifyy`**. CLI-команда: **`graphify`**.

---

## 2. Подключить к проекту и Cursor

```bash
cd /путь/к/Avi-dveri_full
graphify cursor install
```

Создаётся `.cursor/rules/graphify.mdc` — Cursor будет учитывать граф в чатах.

Если правило уже есть в репозитории (с другой машины через git), команду всё равно можно выполнить — файл обновится.

---

## 3. Игнор файлов

В корне проекта должен быть `.graphifyignore`. Минимально необходимый набор:

```gitignore
vendor/
node_modules/
storage/
bootstrap/cache/
public/build/
public/hot
public/avi-dveri_assets/
public/storage
docker/
database/*.sqlite
*.log
.DS_Store
graphify-out/
.idea/
.git/
.cursor/
.env
.env.*
```

Без `public/avi-dveri_assets/` граф раздуется статикой и изображениями.

Синтаксис такой же, как у `.gitignore`.

---

## 4. Первый билд графа

В **Agent**-чате Cursor, в корне проекта:

```
/graphify .
```

Результат появится в `graphify-out/`:

| Файл | Назначение |
|------|------------|
| `graph.html` | Интерактивный граф (открыть в браузере) |
| `GRAPH_REPORT.md` | Обзор архитектуры, god nodes, вопросы |
| `graph.json` | Данные для `query` / `path` / `explain` |
| `cache/` | Кэш извлечения |
| `manifest.json` | Манифест для инкрементального `--update` |

Код (PHP и др.) парсится локально через AST. Документы (`.md` и т.п.) — через модель ассистента.

Опционально: переменная `GEMINI_API_KEY` для semantic extraction docs. Для code-first Laravel не обязательна.

---

## 5. Как пользоваться

### В Cursor

Задавайте обычные вопросы про архитектуру и зависимости. Правило `graphify.mdc` подталкивает агента сначала к графу (`query` / `path` / `explain`), а не к полному grep по репозиторию.

### В терминале

```bash
cd /путь/к/Avi-dveri_full

graphify query "как устроен фильтр каталога?"
graphify path "DoorController" "ProductRepository"
graphify explain "Product"
```

### Визуально

```bash
open graphify-out/graph.html
```

Или откройте файл вручную в браузере. Также полезен обзор: `graphify-out/GRAPH_REPORT.md`.

### Когда это помогает

- Онбординг / «где живёт фича X»
- Рефакторинг: «что зависит от Product»
- Поиск путей: controller → service → model → helper

### Когда почти не нужно

- Правка одной строки в уже известном файле
- CSS / чисто визуальные правки

---

## 6. Обновление графа после правок кода

Инкрементально (только изменённые файлы, AST, без LLM):

```bash
cd /путь/к/Avi-dveri_full
source $HOME/.local/bin/env   # если graphify не в PATH
graphify update .
```

Полная пересборка в чате Cursor:

```
/graphify .
```

Инкремент из чата:

```
/graphify . --update
```

Автообновление после commit / смены ветки (опционально):

```bash
graphify hook install
graphify hook status
# снять: graphify hook uninstall
```

---

## 7. Обновление самого Graphify

```bash
source $HOME/.local/bin/env
uv tool upgrade graphifyy
# или:
# uv tool install --upgrade graphifyy --python 3.12
```

После апгрейда при желании:

```bash
cd /путь/к/Avi-dveri_full
graphify cursor install
```

---

## 8. Git: что коммитить

| Коммитить | Обычно не коммитить |
|-----------|---------------------|
| `.graphifyignore` | `graphify-out/` (тяжёлый, локальный артефакт) |
| `.cursor/rules/graphify.mdc` | `graphify-out/cache/` |
| `docs/graphify.md` (эта инструкция) | |

Дома после `git pull`:

- если `graphify-out/` нет — один раз `/graphify .`
- если граф есть, а код менялся — `graphify update .`

---

## Чеклист: новый компьютер

1. Python 3.12 + `uv tool install graphifyy --python 3.12`
2. Клон проекта, `cd` в корень
3. `graphify cursor install`
4. Проверить `.graphifyignore`
5. В Cursor: `/graphify .`
6. Дальше после существенных правок: `graphify update .`

---

## Ссылки

- Документация: https://graphify.com/docs
- Репозиторий: https://github.com/safishamsi/graphify
