# Dapperly Driven — Theme Development Notes

## Overview
Custom WordPress Gutenberg theme for Dapperly Driven — an automotive lifestyle brand selling clothing, die-cast models, and collectables.

**Theme slug:** `dapperly-driven`  
**Text domain:** `dapperly-driven`  
**Function prefix:** `dd_`  
**CSS class prefix:** `dd-`

---

## Design System

### Colour Palette
| Token | Hex | Usage |
|---|---|---|
| `--dd-navy` | `#0F2B5B` | Primary — headings, buttons, nav |
| `--dd-blue` | `#4A6FA5` | Accent — links, category labels, secondary buttons |
| `--dd-cream` | `#E8D8B0` | Contrast on navy — button text, highlights |
| `--dd-tint` | `#EEF2F8` | Alternate section background (cool blue-white) |
| `--dd-white` | `#FEFEFE` | Base background |
| `--dd-text` | `#1A2A3A` | Body copy |
| `--dd-muted` | `#5A6A7A` | Secondary text, meta |
| `--dd-border` | `#D8E0EC` | Section dividers, card borders |

### Typography
- **Display/Headings:** DM Serif Display (Google Fonts) — loaded via `functions.php`
- **Body/UI:** DM Sans (Google Fonts)
- Both are enqueued together in one Google Fonts request for performance.

### Gutenberg Block Editor
- The block editor palette mirrors the design tokens (set in `functions.php` via `editor-color-palette`).
- Editor styles load via `assets/css/editor.css`.
- Supports: wide alignment, responsive embeds, block styles.

---

## File Structure

```
dapperly-driven/
├── style.css               # Theme header + all CSS
├── functions.php           # Setup, enqueue, WooCommerce hooks
├── header.php
├── footer.php
├── front-page.php          # Homepage (hero, categories, products, lifestyle band, pillars, blog)
├── index.php               # Blog listing
├── single.php              # Single post
├── page.php                # Generic page
├── page-contact.php        # Contact page template
├── archive.php             # Category / date archives
├── archive-product.php     # WooCommerce shop page
├── single-product.php      # WooCommerce single product
├── search.php              # Search results
├── 404.php
├── inc/
│   ├── template-tags.php   # dd_pagination()
│   └── nav-walker.php      # DD_Nav_Walker class
├── template-parts/
│   └── card-post.php       # Blog card partial
└── assets/
    ├── js/main.js           # Scroll header, mobile nav
    └── css/editor.css       # Block editor styles
```

---

## WooCommerce Setup

After activating the theme and WooCommerce:

1. Go to **WooCommerce → Settings → Products** — confirm product categories are set up (Clothing, Die-Cast, Collectables)
2. The shop archive uses a 3-column grid (12 products per page)
3. Sidebar is removed from the shop — layout is full-width
4. Cart count updates via AJAX on add-to-cart

### Product Categories
Set up these top-level categories in **Products → Categories**:
- Clothing
- Die-Cast Models
- Collectables

---

## Homepage Sections (front-page.php)

All copy is editable in the block editor on the homepage if set as a static front page. The PHP template renders:

1. **Hero** — headline + sub-copy + CTA buttons + image panel (use a featured image on the page)
2. **Announcement strip** — navy band (edit in `front-page.php` or make dynamic via ACF/options page)
3. **Shop by Category** — auto-pulls WooCommerce product categories (top 3 non-empty)
4. **Latest Arrivals** — auto-pulls 4 most recent published products
5. **Lifestyle Band** — dark navy section with brand story copy + image slot
6. **Why Dapperly Driven** — 4 pillar cards (editable in `front-page.php`)
7. **From the Blog** — auto-pulls 3 most recent posts

---

## Menus

Register in **Appearance → Menus**:
- **Primary Navigation** — main header nav
- **Footer Navigation** — footer legal links (Privacy, Terms, Contact)

Footer widget columns are registered as sidebars — use **Appearance → Widgets** to populate.

---

## Local Development

Site runs via **LocalWP**.  
Local URL: `http://dapperlydriven.local`

### Workflow
1. Edit theme files directly in `Local Sites/dapperlydriven/app/public/wp-content/themes/dapperly-driven/`
2. Changes are immediate — no build step required
3. Push to GitHub when a feature or fix is complete
4. Deploy to live via WP Pusher (pushing to `main` branch triggers deploy)

---

## Git

Repo: GitHub — `dapperly-driven` (private)  
Branch strategy: work on `main`, use feature branches for significant changes.

`.gitignore` excludes: `.DS_Store`, `Thumbs.db`, `*.log`, `node_modules/`
