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
| **Frontend**          | HTML5, CSS3 (Bootstrap 5), JavaScript (ES6)                                |
| **Backend**           | PHP 8.2 + Composer (MVC Architecture)                                      |
| **Autenticación**     | **Firebase Auth** (Manejo de identidad y seguridad)                        |
| **Base de Datos**     | **PostgreSQL** (Alojado en **Supabase**)                                   |
| **Infraestructura**   | **Docker** & Docker Compose (Entorno contenedorizado)                      |
| **Seguridad**         | Variables de entorno con **DotEnv** (.env)                                 |
| **Videojuego**        | **Godot Engine** (Implementación de minijuego interactivo)                 |
| **Documentación**     | Markdown + GitHub Pages

---

## Estructura del proyecto

```text
coffmunnity/
├── docker/               # Configuración de contenedores (PHP-FPM, Nginx)
├── docs/                 # Documentación técnica y guía de estilos -> GitHub Pages
├── game/                 # Proyecto de videojuego (Godot Engine)
├── src/                  # Código fuente principal de la aplicación
│   ├── app/              # Lógica interna (Backend)
│   │   ├── config/       # Conexión a base de datos y Firebase
│   │   ├── controllers/  # Controladores (Arquitectura MVC)
│   │   ├── includes/     # Componentes compartidos
│   │   ├── lang/         # Ficheros de internacionalización (ES / EN)
│   │   └── views/        # Plantillas y vistas HTML
│   ├── public/           # Directorio raíz del servidor web (DocumentRoot)
│   │   └── assets/       # Estilos CSS, Scripts JS, Imágenes y Multimedia
│   └── tests/            # Tests automáticos
├── .env                  # Variables de entorno secretas (Ignorado en Git)
├── .env.example          # Plantilla pública de variables de entorno
├── .gitignore            # Reglas de exclusión para el control de versiones
├── docker-compose.yml    # Configuración de servicios Docker
├── LICENSE               # Licencia de distribución del proyecto
└── README.md             # Presentación y documentación principal           
```

---

## 🧾 Licencia

Este proyecto se desarrolla únicamente con fines académicos para el **Trabajo Fin de Grado Superior de DAW**.

---

## 🧑‍💻 Autor

**Miguel Ángel Martínez Guijarro**<br>
Desarrollo de Aplicaciones Web – IES Macià Ábela<br>
Año académico: 2025-2026
