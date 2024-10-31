-- Inserción de Proyectos Adicionales
INSERT INTO `Project` (`id`, `name`, `description`) VALUES
(3, 'Libft', 'Implementación de funciones de la biblioteca estándar de C.'),
(4, 'Get Next Line', 'Lectura de una línea de un archivo sin conocer su tamaño.'),
(5, 'Ft_printf', 'Implementación de una función similar a printf de C.');

-- Inserción de Tecnologías Adicionales
INSERT INTO `Technology` (`id`, `name`, `description`) VALUES
(3, 'C', 'C es un lenguaje de programación de propósito general que se utiliza ampliamente para desarrollar software de sistema y aplicaciones.'),
(4, 'Makefile', 'Un Makefile es un archivo que define un conjunto de tareas a ser ejecutadas en el directorio de un programa.'),
(5, 'Git', 'Git es un sistema de control de versiones distribuido que permite a múltiples desarrolladores trabajar en un mismo proyecto de manera colaborativa.');

-- Inserción de Relaciones entre Proyectos y Tecnologías
INSERT INTO `ProjectTechnology` (`projectId`, `technologyId`) VALUES
(3, 3), -- Libft con C
(3, 4), -- Libft con Makefile
(4, 3), -- Get Next Line con C
(4, 4), -- Get Next Line con Makefile
(5, 3), -- Ft_printf con C
(5, 4), -- Ft_printf con Makefile
(5, 5); -- Ft_printf con Git
