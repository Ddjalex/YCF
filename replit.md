# UNPSF 2025 Event Management Platform

## Overview

A professional, institutional-grade event management platform inspired by the UNPSF 2025 design. This project is built using pure PHP with a modular procedural architecture, focusing on a clean, high-performance design suitable for international organization events.

The platform features a corporate/international organization aesthetic with high-contrast blue and white color palettes, hero sections with countdown timers, clear navigation grids, and professional typography. Core functionality includes event countdown displays, news/updates management, registration capabilities, and informational pages (About, Agenda, News).

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Frontend Architecture
- **Approach**: Server-rendered PHP pages with modular components
- **Rationale**: Keeps the stack simple and performant without JavaScript framework complexity
- **Components**:
  - `header.php` / `footer.php`: Global layout components for consistent design
  - Hero sections with countdown timers
  - Participation Seats: A dynamic section highlighting forum capacity with color-coded funding categories and hover animations.
  - Navigation grids and data cards using PHP loops

### Backend Architecture
- **Approach**: Modular Procedural PHP (no framework)
- **Rationale**: Simple to manage, easy to deploy, minimal dependencies
- **Structure**:
  - `index.php`: Main landing page entry point
  - `functions.php`: Business logic for countdown calculations and data fetching
  - Separate page files for About, Agenda, News sections

### Design System
- **Color Palette**: High-contrast blue and white (institutional/corporate style)
- **Typography**: Clean sans-serif fonts (Inter or Roboto)
- **Layout**: Sticky navigation bar with logo and action buttons, card-based content grids
- **Animations**: Diagonal sliding background effect on buttons using CSS pseudo-elements with `skewX(-25deg)` and custom `cubic-bezier` timing.

### Data Storage
- **Approach**: PHP arrays or simple SQLite database
- **Rationale**: Lightweight storage suitable for event content and news items
- **Use Cases**: News articles, event agenda items, registration data

## External Dependencies

### Required Services
- **PHP Runtime**: Core server-side processing (PHP 7.4+ recommended)
- **SQLite** (optional): Lightweight database for persistent content storage

### Frontend Assets
- **Google Fonts**: Inter or Roboto for professional typography
- **CSS**: Custom styles matching UNPSF 2025 corporate aesthetic

### No External APIs Required
The platform is designed to be self-contained with static or database-driven content.