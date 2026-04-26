---
name: Technical Precision
colors:
  surface: '#fbf9f8'
  surface-dim: '#dcd9d9'
  surface-bright: '#fbf9f8'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f6f3f2'
  surface-container: '#f0eded'
  surface-container-high: '#eae7e7'
  surface-container-highest: '#e4e2e1'
  on-surface: '#1b1c1c'
  on-surface-variant: '#424751'
  inverse-surface: '#303030'
  inverse-on-surface: '#f3f0f0'
  outline: '#727782'
  outline-variant: '#c2c6d3'
  surface-tint: '#1c5faa'
  primary: '#003c75'
  on-primary: '#ffffff'
  primary-container: '#02539e'
  on-primary-container: '#a9c9ff'
  inverse-primary: '#a7c8ff'
  secondary: '#845400'
  on-secondary: '#ffffff'
  secondary-container: '#feaa22'
  on-secondary-container: '#6a4300'
  tertiary: '#003e70'
  on-tertiary: '#ffffff'
  tertiary-container: '#005597'
  on-tertiary-container: '#a5caff'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#d5e3ff'
  primary-fixed-dim: '#a7c8ff'
  on-primary-fixed: '#001b3c'
  on-primary-fixed-variant: '#004788'
  secondary-fixed: '#ffddb6'
  secondary-fixed-dim: '#ffb95a'
  on-secondary-fixed: '#2a1800'
  on-secondary-fixed-variant: '#643f00'
  tertiary-fixed: '#d3e4ff'
  tertiary-fixed-dim: '#a3c9ff'
  on-tertiary-fixed: '#001c38'
  on-tertiary-fixed-variant: '#004882'
  background: '#fbf9f8'
  on-background: '#1b1c1c'
  surface-variant: '#e4e2e1'
typography:
  h1:
    fontFamily: Inter
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: -0.02em
  h2:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.3'
    letterSpacing: -0.01em
  h3:
    fontFamily: Inter
    fontSize: 20px
    fontWeight: '600'
    lineHeight: '1.4'
    letterSpacing: '0'
  body-lg:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
    letterSpacing: '0'
  body-md:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '400'
    lineHeight: '1.5'
    letterSpacing: '0'
  label-md:
    fontFamily: Inter
    fontSize: 13px
    fontWeight: '600'
    lineHeight: '1'
    letterSpacing: 0.02em
  label-sm:
    fontFamily: Inter
    fontSize: 11px
    fontWeight: '700'
    lineHeight: '1'
    letterSpacing: 0.05em
  code:
    fontFamily: monospace
    fontSize: 13px
    fontWeight: '400'
    lineHeight: '1.4'
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  xs: 0.25rem
  sm: 0.5rem
  md: 1rem
  lg: 1.5rem
  xl: 2rem
  gutter: 1rem
  margin: 1.5rem
---

## Brand & Style

The design system is engineered for high-stakes monitoring environments where speed of cognition is the primary metric. It balances the corporate reliability of an established ISP with the technical rigor required for a Network Operation Center (NOC).

The visual style is **Corporate / Modern**, emphasizing high-contrast utility and structural order. It avoids decorative elements in favor of a "Dashboard-First" philosophy. The interface must feel authoritative and stable, evoking trust through systematic alignment and clear information hierarchy. Every pixel serves the purpose of uptime and incident resolution.

## Colors

This design system utilizes a high-contrast palette to ensure legibility during extended monitoring shifts. The primary brand blue (#02539E) establishes professional authority, while the secondary amber (#EF9D0F) is reserved for highlighting interactive elements or secondary warnings.

### Traffic Light Status System
The core of the NOC functionality relies on a standardized status system:
- **Operational:** #22C55E (Green) - Used for healthy nodes and "All Systems Go" states.
- **Maintenance:** #EAB308 (Yellow) - Used for scheduled work and non-critical warnings.
- **Incident:** #EF4444 (Red) - Reserved strictly for outages and critical failures requiring immediate action.

Neutrals are biased toward cool grays to keep the interface feeling clean and technical. Background surfaces use a subtle off-white (#F8FAFC) to reduce eye strain compared to pure white.

## Typography

Inter is the sole typeface for this design system, chosen for its exceptional legibility in data-heavy layouts and technical contexts. 

- **Headlines:** Use Bold and Semi-Bold weights with tighter letter spacing to create a sense of urgency and importance.
- **Body Text:** Primarily uses a 14px base to maximize data density while maintaining readability.
- **Labels:** Small, uppercase labels are utilized for category badges and metadata, ensuring they are distinct from actionable body text.
- **Monospace:** For IP addresses, server logs, and MAC addresses, use a system monospace fallback to ensure character alignment.

## Layout & Spacing

The system employs a **Fluid Grid** model with a 12-column structure for main dashboards. The layout prioritizes "above the fold" information density, allowing NOC operators to see maximum data without excessive scrolling.

- **Grid:** 12-column layout with 16px (1rem) gutters.
- **Rhythm:** An 8px base unit (0.5rem) governs all padding and margin decisions. 
- **Density:** Dashboard widgets should use 'Compact' padding (12px) internally to allow for high-volume data visualization, while standard pages use 'Comfortable' padding (24px).

## Elevation & Depth

To maintain a technical and high-contrast feel, this design system avoids heavy shadows. Instead, it uses **Tonal Layers** and **Low-Contrast Outlines**.

- **Surfaces:** The primary canvas is #F8FAFC. Cards and containers are pure #FFFFFF.
- **Borders:** Every card and input field uses a 1px border (#E2E8F0). In active or focused states, the border shifts to Primary Blue.
- **Shadows:** Use a single "Technical Shadow" for floating elements like dropdowns or modals: `0px 4px 6px -1px rgba(0, 0, 0, 0.1), 0px 2px 4px -1px rgba(0, 0, 0, 0.06)`. 
- **Z-Index:** Clear layering ensures that navigation sits above the canvas, and critical alerts sit at the highest elevation.

## Shapes

The shape language is "Softly Geometric." A consistent radius is applied to bridge the gap between rigid technicality and modern corporate aesthetics.

- **Cards & Containers:** Use a 12px (rounded-lg) radius to define clear workspace boundaries.
- **Buttons & Inputs:** Use an 8px (rounded) radius for a professional, clickable appearance.
- **Badges:** Use a pill-shape (full rounding) for status indicators to make them instantly recognizable against the rectangular grid of the dashboard.

## Components

### Buttons
- **Primary:** Solid #02539E with white text. High contrast, clear action.
- **Secondary:** Outlined with #02539E and 1px border.
- **Ghost:** No background, #1D7CD3 text for utility actions.

### Traffic Light Badges
- **Style:** Pill-shaped with a 10% opacity background of the status color and 100% opacity text of the same color. 
- **Indicators:** Include a small 6px circular dot next to the text for accessibility.

### Cards
- White background, 1px border (#E2E8F0), 12px corner radius.
- Headers within cards should have a subtle bottom border to separate titles from content.

### Data Tables
- Header row: Light gray background (#F1F5F9), uppercase label-sm typography.
- Row height: Fixed at 48px for standard, 40px for compact views.
- Alternating row stripes are not used; 1px horizontal dividers are preferred for a cleaner look.

### Input Fields
- White background, 8px radius, 1px border.
- Focused state: 1px border #1D7CD3 with a 2px soft blue outer glow.
- Error state: 1px border #EF4444.