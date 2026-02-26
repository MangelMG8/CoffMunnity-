# TFG - DAW

# ☕ CoffMunnity

**CoffMunnity** es una plataforma web integral para entusiastas del café, desarrollada como Proyecto Intermodular del Grado Superior de Desarrollo de Aplicaciones Web (DAW). 
El proyecto combina una comunidad social, gestión de reseñas y una experiencia lúdica mediante un minijuego interactivo.

---

## 🚀 Requisitos del Módulo de Despliegue

- Realizar el **control de versiones** con Git y GitHub utilizando **ramas y tags**.
- Compartir el repositorio desde el inicio con el usuario **JavierMasDiaz**.
- Desplegar la aplicación en la **nube** (recomendado AWS) y mantener el entorno local.
- Redactar toda la **documentación del proyecto** usando **Markdown** y **GitHub Pages**.
- Utilizar **Docker** de forma opcional para facilitar el transporte del proyecto.
  
---


## 🐘 Requisitos de Entorno Servidor (DAWES)

- Desarrollar el backend utilizando el lenguaje de programación **PHP**.
- Gestionar la base de datos **MySQL** (PDO o MySQLi) con operaciones **CRUD completas**.
- Implementar **control de sesiones y cookies** para distinguir roles de *Admin* y *Usuario*.
- Crear vistas con **listados, filtrado, paginación y exportación a PDF**.
- Permitir la **subida de ficheros** al servidor (imágenes, documentos o configuración).
- Estructurar la aplicación mediante **plantillas** (header, body, footer) y código organizado.

---


## 🌐 Requisitos de Entorno Cliente (DWEC)

- Programar con **JavaScript legible**, con comentarios detallados y uso del objeto `Date`.
- Realizar la **validación de formularios** en cliente mediante **expresiones regulares**.
- Manipular el **DOM** y gestionar el comportamiento de la página a través de **eventos**.
- Aplicar **jQuery** para efectos visuales (*Fade*, *Slide*), mostrar/ocultar elementos y un **Slideshow**.
- Cargar contenido dinámico del servidor sin recargar la página mediante **AJAX**.
- Documentar técnicamente todas las funciones y lógica de cliente implementada.
  
---

## 🎨 Requisitos de Diseño de Interfaces Web (DIW)

- Crear una **Guía de Estilo Web** que detalle la estructura, el color, la tipografía, los menús, imágenes y logotipos.
- Definir el **diseño responsivo** dentro de la guía, especificando claramente los **puntos de ruptura (breakpoints)**. 
- Entregar los **ficheros del prototipo** para resoluciones de **Móvil**, **Tablet** y **Escritorio**.
- Construir el **layout** o estructura general del sitio utilizando exclusivamente **etiquetas semánticas de HTML5**.
- Desarrollar los **formularios** íntegramente con HTML5, aplicando tipos de campos y **validación nativa**.
- Asegurar que todo el **FrontEnd sea 100% responsivo**, aplicando una estrategia **Mobile First**.
- Estar preparado para **explicar cualquier efecto, propiedad CSS o estilo** utilizado durante la exposición del proyecto.
  
---

## 🧩 Tecnologías utilizadas

| Tipo                  | Tecnología                                                                 |
| --------------------- | -------------------------------------------------------------------------- |
| **Frontend** | HTML5, CSS3 (Bootstrap 5), JavaScript (ES6)                                |
| **Backend** | PHP 8.2 + Composer                                                         |
| **Autenticación** | **Firebase Auth** (Integración con SDK de Google)                          |
| **Base de datos** | MySQL 8.0                                                                  |
| **Entorno / Hosting** | **Docker** & Docker Compose / **AWS (EC2)** |
| **Videojuego** | **Godot Engine** (Implementación futura de minijuego interactivo)          |
| **Documentación** | Markdown + GitHub Pages                                                    |

---

## 🗂 Estructura del proyecto

```text
coffmunity/
├── docker/               # Configuración de contenedores (PHP, MySQL, Nginx)
├── docs/                 # Documentación técnica (Markdown) -> GitHub Pages
├── game/                 # Proyecto de videojuego (Godot)
├── src/                  # Código fuente de la aplicación
│   ├── app/              # MVC: Controladores, Modelos y Lógica (Firebase SDK)
│   ├── config/           # Configuración de DB y Firebase
│   ├── public/           # Punto de entrada (index.php, Assets: CSS, JS)
│   ├── tests/            # Tests automáticos (PHPUnit)
│   └── views/            # Vistas y plantillas
├── docker-compose.yml    # Orquestador de servicios
├── .env                  # Variables de entorno (No incluido en Git)
└── README.md             # Presentación del proyecto
```

---

## 🧾 Licencia

Este proyecto se desarrolla únicamente con fines académicos para el **Trabajo Fin de Grado Superior de DAW**.

---

## 🧑‍💻 Autor

**Miguel Ángel Martínez Guijarro**<br>
Desarrollo de Aplicaciones Web – IES Macià Ábela<br>
Año académico: 2025-2026
