# Colores — CoffMunnity

[← Volver al índice](../index.md)

La paleta de CoffMunnity está inspirada en los tonos naturales del café: desde la crema del espresso hasta el marrón oscuro del grano tostado, complementados con un acento verde musgo que evoca lo artesanal y sostenible.

---

## Paleta Principal

Estos colores son los protagonistas de la identidad visual. Deben usarse en encabezados, botones primarios, fondos principales y elementos de marca.

| Nombre | HEX | RGB | Uso |
|---|---|---|---|
| **Espresso** | `#2C1810` | rgb(44, 24, 16) | Textos principales, navbar |
| **Roast** | `#6B3A2A` | rgb(107, 58, 42) | Botones primarios, íconos activos |
| **Caramel** | `#C4813B` | rgb(196, 129, 59) | CTAs, highlights, enlaces |
| **Latte** | `#E8C99A` | rgb(232, 201, 154) | Fondos de tarjetas, hover states |
| **Cream** | `#FAF3E8` | rgb(250, 243, 232) | Fondo general de la app |

---

## Paleta Secundaria

Colores de apoyo para secciones específicas, etiquetas y elementos de la comunidad.

| Nombre | HEX | RGB | Uso |
|---|---|---|---|
| **Moss** | `#4A6741` | rgb(74, 103, 65) | Etiquetas, badges de comunidad |
| **Steam** | `#B8C4BB` | rgb(184, 196, 187) | Bordes, divisores, placeholders |
| **Chalk** | `#F5F0EA` | rgb(245, 240, 234) | Fondos alternativos, modales |

---

## Colores de Estado

Para mensajes del sistema, validaciones de formularios y alertas en la plataforma.

| Nombre | HEX | Estado | Uso |
|---|---|---|---|
| **Matcha** | `#5A8A4A` | ✅ Éxito | Confirmaciones, reseñas publicadas |
| **Amber** | `#D4890A` | ⚠️ Aviso | Advertencias, formularios incompletos |
| **Brick** | `#B94040` | ❌ Error | Errores, eliminación de contenido |
| **Sky Roast** | `#3A7CA5` | ℹ️ Info | Notificaciones informativas |

---

## Gradientes

Gradientes oficiales para banners, heroes y fondos de sección especiales.

### Gradient Coffee
```css
background: linear-gradient(135deg, #2C1810 0%, #6B3A2A 50%, #C4813B 100%);
```
*Uso: Hero principal, splash screen del minijuego.*

### Gradient Latte
```css
background: linear-gradient(180deg, #FAF3E8 0%, #E8C99A 100%);
```
*Uso: Fondos de sección, cards destacadas.*

---

## Contraste y Accesibilidad

La paleta cumple con las pautas **WCAG 2.1** para garantizar legibilidad a todos los usuarios.

| Combinación | Ratio | Nivel |
|---|---|---|
| Espresso `#2C1810` sobre Cream `#FAF3E8` | 16.2:1 | ✅ AAA |
| Roast `#6B3A2A` sobre Cream `#FAF3E8` | 8.4:1 | ✅ AAA |
| Caramel `#C4813B` sobre Espresso `#2C1810` | 4.8:1 | ✅ AA |
| Cream `#FAF3E8` sobre Roast `#6B3A2A` | 8.4:1 | ✅ AAA |


---

## Variables CSS

Implementación recomendada mediante custom properties en el proyecto.

```css
:root {
  /* Paleta Principal */
  --color-espresso:  #2C1810;
  --color-roast:     #6B3A2A;
  --color-caramel:   #C4813B;
  --color-latte:     #E8C99A;
  --color-cream:     #FAF3E8;

  /* Paleta Secundaria */
  --color-moss:      #4A6741;
  --color-steam:     #B8C4BB;
  --color-chalk:     #F5F0EA;

  /* Estados */
  --color-success:   #5A8A4A;
  --color-warning:   #D4890A;
  --color-error:     #B94040;
  --color-info:      #3A7CA5;
}
```

---

*Guía de Estilo · CoffMunnity · TFG DAW*