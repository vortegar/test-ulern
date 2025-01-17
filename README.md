
# **_Nombre del Proyecto_**
Prueba Tecnica empresa Ulern

# **_Tecnologías Utilizadas_**
Backend: Laravel (PHP)  
Frontend: Vue 3  
Base de datos: SQLite  
Otros: Composer, NPM

# **_Instalación_**
Sigue estos pasos para instalar y configurar el proyecto en tu máquina local.

1. Clonar el repositorio
```bash
git clone https://github.com/vortegar/test-ulern.git
cd test-ulern.git
```

2. **Configuración del Backend (Laravel)**  
   Instalar dependencias de Laravel:
   ```bash
   composer install
   ```
   Configurar el archivo .env:  
   Copia el archivo `.env.example` a un nuevo archivo `.env`:
   ```bash
   cp .env.example .env
   ```

   Asegúrate de configurar tu base de datos en el archivo `.env`. Por ejemplo, si estás usando SQLite:
   ```ini
   DB_CONNECTION=sqlite
   DB_DATABASE=/path_to_your_project/database/database.sqlite
   ```

   Generar la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

   Ejecutar las migraciones (Opcional):
   ```bash
   php artisan migrate
   ```

3. **Configuración del Frontend (Vue 3)**  
   Instalar dependencias de Vue:
   ```bash
   npm install
   ```

   Configurar la URL de la API en Vue:  
   En tu archivo de configuración de Vue, generalmente en `src/api.js` o en el archivo donde se configuran las solicitudes de Axios, asegúrate de que la URL apunte a tu backend. Si estás corriendo el backend localmente en el puerto 8000, puede ser algo como:
   ```javascript
   const apiUrl = 'http://127.0.0.1:8000';
   ```

4. **Servir la aplicación**  
   Servir el backend de Laravel:
   ```bash
   php artisan serve
   ```

   Servir el frontend de Vue:
   ```bash
   npm run dev
   ```

5. **Acceder a la aplicación**  
   Abre tu navegador y ve a `http://127.0.0.1:8000` para acceder (puede que asigne otro puerto).

# **_Funcionalidades_**
- **Registro y autenticación**: Los usuarios pueden crear una cuenta y autenticarse.
- **Interfaz interactiva**: La aplicación frontend está construida con Vue 3, lo que permite una experiencia de usuario fluida y dinámica.
