---
layout: default
title: Tipografía
parent: Guía de Estilo
nav_order: 2
---

# 🔤 Tipografía — CoffMunnity

[← Volver al índice](index.md)

CoffMunnity utiliza **Montserrat** como fuente única del sistema. Su geometría limpia y carácter moderno se alinea perfectamente con la identidad de la plataforma: contemporánea, legible y con personalidad propia.

---

## Fuente Principal

### Montserrat

> Diseñada por Julieta Ulanovsky. Inspirada en la tipografía urbana del barrio de Montserrat (Buenos Aires).

- **Proveedor:** [Google Fonts](https://fonts.google.com/specimen/Montserrat)
- **Licencia:** SIL Open Font License 1.1
- **Clasificación:** Sans-serif geométrica

### Importación en el proyecto

**Opción A — Enlace en HTML `<head>`:**
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.google.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
```

**Opción B — Importación en CSS:**
```css
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap');
```

**Declaración base:**
```css
body {
  font-family: 'Montserrat', sans-serif;
}
```

---

## Pesos tipográficos

Solo se cargan los pesos utilizados en el proyecto para optimizar el rendimiento.

| Peso | Nombre | Valor CSS | Uso principal |
|---|---|---|---|
| Light | `font-weight: 300` | 300 | Subtítulos suaves, captions |
| Regular | `font-weight: 400` | 400 | Cuerpo de texto, párrafos |
| Medium | `font-weight: 500` | 500 | Labels, textos de interfaz |
| SemiBold | `font-weight: 600` | 600 | Subtítulos, nombre de usuario |
| Bold | `font-weight: 700` | 700 | Títulos de sección, botones |
| ExtraBold | `font-weight: 800` | 800 | Hero titles, marca principal |

---

## Escala tipográfica

Sistema de tamaños basado en una escala modular para mantener coherencia visual en toda la plataforma.

| Token | Tamaño | Peso | Line-height | Uso |
|---|---|---|---|---|
| `--text-xs` | 12px | 500 | 1.4 | Badges, metadatos, fechas |
| `--text-sm` | 14px | 400 | 1.5 | Captions, textos secundarios |
| `--text-base` | 16px | 400 | 1.6 | Cuerpo principal de texto |
| `--text-md` | 18px | 500 | 1.5 | Intro de artículo, destacados |
| `--text-lg` | 20px | 600 | 1.4 | Subtítulos H3, nombre de producto |
| `--text-xl` | 24px | 700 | 1.3 | Títulos H2, sección headers |
| `--text-2xl` | 32px | 700 | 1.2 | Títulos H1, page titles |
| `--text-3xl` | 48px | 800 | 1.1 | Hero title, splash del minijuego |

### Variables CSS

```css
:root {
  --font-family:   'Montserrat', sans-serif;

  --text-xs:   0.75rem;   /* 12px */
  --text-sm:   0.875rem;  /* 14px */
  --text-base: 1rem;      /* 16px */
  --text-md:   1.125rem;  /* 18px */
  --text-lg:   1.25rem;   /* 20px */
  --text-xl:   1.5rem;    /* 24px */
  --text-2xl:  2rem;      /* 32px */
  --text-3xl:  3rem;      /* 48px */
}
```

---

## Jerarquía de encabezados

```css
h1 {
  font-size: var(--text-2xl);   /* 32px */
  font-weight: 800;
  letter-spacing: -0.02em;
  color: var(--color-espresso);
}

h2 {
  font-size: var(--text-xl);    /* 24px */
  font-weight: 700;
  letter-spacing: -0.01em;
  color: var(--color-espresso);
}

h3 {
  font-size: var(--text-lg);    /* 20px */
  font-weight: 600;
  color: var(--color-roast);
}

h4 {
  font-size: var(--text-md);    /* 18px */
  font-weight: 600;
  color: var(--color-roast);
}

p {
  font-size: var(--text-base);  /* 16px */
  font-weight: 400;
  line-height: 1.6;
  color: var(--color-espresso);
}

small, .caption {
  font-size: var(--text-sm);    /* 14px */
  font-weight: 400;
  color: var(--color-steam);
}
```

---

## Usos específicos en la plataforma

### Botones
```css
.btn {
  font-family: var(--font-family);
  font-size: var(--text-sm);    /* 14px */
  font-weight: 700;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}
```

### Nombre de usuario / Perfil
```css
.username {
  font-size: var(--text-md);
  font-weight: 600;
  color: var(--color-roast);
}
```

### Puntuación / Reseña (minijuego y comunidad)
```css
.score {
  font-size: var(--text-2xl);
  font-weight: 800;
  color: var(--color-caramel);
  letter-spacing: -0.03em;
}
```

### Etiquetas y badges
```css
.badge {
  font-size: var(--text-xs);
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
}
```

---

## Espaciado entre letras (letter-spacing)

| Contexto | Valor | Ejemplo de uso |
|---|---|---|
| Títulos grandes | `-0.02em` a `-0.03em` | H1, hero |
| Cuerpo de texto | `0` (sin modificar) | Párrafos |
| Botones y badges | `+0.05em` a `+0.08em` | CTAs, etiquetas |
| Texto uppercase | `+0.1em` | Labels en mayúsculas |

---

## Reglas de uso

✅ **Sí:**
- Usar Montserrat para todos los elementos de texto de la interfaz.
- Mantener la escala modular definida.
- Combinar pesos para crear jerarquía visual clara.
- Usar `letter-spacing` negativo en títulos grandes para mejorar la composición.

❌ **No:**
- Mezclar otras fuentes sin justificación documentada.
- Usar pesos no definidos en la escala (ej: 100, 200, 900).
- Aplicar `text-transform: uppercase` a párrafos de cuerpo.
- Usar tamaños intermedios fuera de la escala definida.

---

*Guía de Estilo · CoffMunnity · TFG DAW*