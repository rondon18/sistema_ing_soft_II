
<p align="center">
	<img alt="Logo del sistema" src="https://github.com/rondon18/sistema_ing_soft_II/blob/main/sistema/img/sisno-18.png" width="250" height="250">
</p>

# Sistema para la UC Ingeniería del software II

Simula un sistema de nómina para una institución educativa. 
El cual permite la gestión de personal, entre este personal obrero, docente y administrativo.

## Características del software
SISNO-18 cuenta con las siguientes funciones:
1. Creación, consulta, edición y eliminación de persona. (Obreros, Docentes y Administrativos).
2. Sistema de usuarios con permisos. (Creación a gusto de nuevos usuarios no disponible actualmente).
3. Generación de reportes de docentes en PDF y Excel.

### Requisitos previos

Para que el sistema pueda funcionar, es necesario que este instalado en el equipo:
- Xampp, o en su defecto apache, mysql y php versión 7 o superior.
- Un navegador actualizado sea ya Google Chrome, Mozilla Firefox, o el de su elección. (Puede haber problemas en la interfaz con Internet Explorer).
- Node.js


### Instalación

Clone el repositorio o descargue el archivo comprimido el repositorio. Extraiga o copie los archivos del repositorios dentro de la carpeta htdocs de su localhost.

Puede clonar el repositorio desde la terminal de git con el comando

	git clone https://github.com/rondon18/sistema_ing_soft_II.git

Bajo alguna duda con esto, véase [Ayuda de github](https://docs.github.com/es/repositories/creating-and-managing-repositories/cloning-a-repository)

- Cree una base de datos con el nombre ingsoft_ii
- Importe en esa base de datos el archivo IngSoftII.sql
- Inicie sesión con uno de los dos usuarios registrados.
- Use el boton Gestionar BD si desea cargar registros de prueba.

## Despliegue

Asegúrese de que el servidor local y los puertos de apache y mysql se estén ejecutando correctamente.

## Desarrollado con:
- HTML5, CSS3 y PHP 8.1 
-  [TailwindCSS](https://tailwindcss.com/)
-  [FPDF](http://www.fpdf.org/)
-  [JQuery](https://jquery.com/)
-  [JQuery validation plugin](https://jqueryvalidation.org/) 
