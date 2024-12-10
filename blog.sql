-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2024 a las 03:42:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(3, 'SI Empresarial', 'Los Sistemas de Informaci&oacute;n Empresarial son conjuntos de herramientas y procesos tecnol&oacute;gicos que gestionan y analizan datos para apoyar la toma de decisiones en las organizaciones.'),
(5, 'SI Marketing Digital', 'Son plataformas que recogen y analizan datos relacionados con campa&ntilde;as de marketing en l&iacute;nea, facilitando la toma de decisiones estrat&eacute;gicas.'),
(6, 'SI de Educaci&oacute;n', 'Los Sistemas de Informaci&oacute;n en la Educaci&oacute;n son plataformas que gestionan y analizan datos relacionados con el aprendizaje, el rendimiento acad&eacute;mico y la administraci&oacute;n educativa para mejorar la ense&ntilde;anza y el aprendizaje.'),
(7, 'Sin categoria', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayor&iacute;a sufri&oacute; alteraciones en alguna manera, ya sea porque se le agreg&oacute; humor, o palabras aleatorias que no parecen ni un poco cre&iacute;bles.'),
(8, 'SI Comercio Electr&oacute;nico', ' Son sistemas dise&ntilde;ados para gestionar y facilitar las transacciones comerciales en l&iacute;nea, integrando pagos, inventarios y servicios al cliente.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(5, 'La realidad virtual', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl&acute;sica de la literatura del Latin, que data del a&ntilde;o 45 antes de Cristo, haciendo que este adquiera mas de 2000 a&ntilde;os de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontr&oacute; una de las palabras m&aacute;s oscuras de la lengua del lat&iacute;n, &quot;consecteur&quot;, en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del lat&iacute;n, descubri&oacute; la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de &quot;de Finnibus Bonorum et Malorum&quot; (Los Extremos del Bien y El Mal) por Cicero, escrito en el a&ntilde;o 45 antes de Cristo. Este libro es un tratado de teor&iacute;a de &eacute;ticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, viene de una linea en la secci&oacute;n 1.10.32\r\n\r\nEl trozo de texto est&aacute;ndar de Lorem Ipsum usado desde el a&ntilde;o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de &quot;de Finibus Bonorum et Malorum&quot; por Cicero son tambi&eacute;n reproducidas en su forma original exacta, acompa&ntilde;adas por versiones en Ingl&eacute;s de la traducci&oacute;n realizada en 1914 por H. Rackham.', '1733716795blog21.jpg', '2024-12-09 03:59:55', 3, 11, 0),
(6, 'Business Intelligence', 'Business Intelligence (BI) es un conjunto de tecnolog&iacute;as, herramientas y pr&aacute;cticas que permiten la recopilaci&oacute;n, an&aacute;lisis y presentaci&oacute;n de datos empresariales para facilitar la toma de decisiones estrat&eacute;gicas. BI convierte grandes vol&uacute;menes de datos en informaci&oacute;n procesable, lo que ayuda a las empresas a identificar oportunidades, mejorar la eficiencia y prever tendencias futuras. A trav&eacute;s de dashboards interactivos, informes personalizados y an&aacute;lisis predictivos, las organizaciones pueden tomar decisiones basadas en datos reales en lugar de suposiciones.\r\n\r\nLas herramientas de BI permiten extraer insights clave de datos hist&oacute;ricos, de ventas, marketing, finanzas y otros departamentos, ayudando a las empresas a optimizar operaciones y mejorar la competitividad. Empresas de todos los tama&ntilde;os y sectores utilizan BI para mejorar la eficiencia operativa, aumentar la rentabilidad y ofrecer un mejor servicio al cliente. Su capacidad para integrar datos de diversas fuentes, tanto internas como externas, hace que BI sea indispensable en la era de la transformaci&oacute;n digital.\r\n\r\nAdem&aacute;s, BI facilita la segmentaci&oacute;n de clientes, la identificaci&oacute;n de patrones en el comportamiento de compra y la mejora de la experiencia del cliente mediante el an&aacute;lisis de datos. Tambi&eacute;n permite realizar an&aacute;lisis de riesgos y optimizaci&oacute;n de procesos, lo que contribuye a la sostenibilidad a largo plazo de la organizaci&oacute;n. El uso de BI es clave en la toma de decisiones &aacute;giles y precisas, permitiendo a las empresas adaptarse r&aacute;pidamente a cambios del mercado.\r\n\r\nEn t&eacute;rminos de infraestructura, BI suele apoyarse en bases de datos grandes y plataformas de an&aacute;lisis avanzado, como los sistemas de procesamiento de datos en tiempo real. El machine learning y la inteligencia artificial tambi&eacute;n est&aacute;n siendo integrados cada vez m&aacute;s en BI, lo que permite que las herramientas de an&aacute;lisis puedan aprender y adaptarse a nuevos datos, mejorando as&iacute; la precisi&oacute;n de las predicciones y recomendaciones.', '1733797320Business Intelligences.jpeg', '2024-12-09 04:49:16', 3, 5, 0),
(7, 'El uso de Adobe Ilustrator ', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayor&iacute;a sufri&oacute; alteraciones en alguna manera, ya sea porque se le agreg&oacute; humor, o palabras aleatorias que no parecen ni un poco cre&iacute;bles. Si vas a utilizar un pasaje de Lorem Ipsum, necesit&aacute;s estar seguro de que no hay nada avergonzante escondido en el medio del texto.Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl&acute;sica de la literatura del Latin, que data del a&ntilde;o 45 antes de Cristo, haciendo que este adquiera mas de 2000 a&ntilde;os de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontr&oacute; una de las palabras m&aacute;s oscuras de la lengua del lat&iacute;n, &quot;consecteur&quot;, en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del lat&iacute;n, descubri&oacute; la fuente indudable. Lorem Ipsum viene de las', '1733721348blog62.jpg', '2024-12-09 05:15:48', 5, 11, 0),
(8, 'La historia de la Neurociencia ', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? ', '1733722746blog17.jpg', '2024-12-09 05:39:06', 6, 11, 0),
(13, 'Gemini revolucionando', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl&acute;sica de la literatura del Latin, que data del a&ntilde;o 45 antes de Cristo, haciendo que este adquiera mas de 2000 a&ntilde;os de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontr&oacute; una de las palabras m&aacute;s oscuras de la lengua del lat&iacute;n, &quot;consecteur&quot;, en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del lat&iacute;n, descubri&oacute; la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de &quot;de Finnibus Bonorum et Malorum&quot; (Los Extremos del Bien y El Mal) por Cicero, escrito en el a&ntilde;o 45 antes de Cristo. Este libro es un tratado de teor&iacute;a de &eacute;ticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, viene de una linea en la secci&oacute;n 1.10.32', '1733762550blog49.jpg', '2024-12-09 16:42:30', 7, 5, 0),
(14, 'Google Classroom', 'Google Classroom es una plataforma gratuita de Google dise&ntilde;ada para facilitar la gesti&oacute;n de tareas, la colaboraci&oacute;n y la comunicaci&oacute;n entre profesores y estudiantes. Permite crear, distribuir y calificar tareas en un entorno digital accesible desde cualquier dispositivo. Con herramientas de integraci&oacute;n con Google Drive, Docs, y Meet, simplifica la interacci&oacute;n en el aula y ofrece un espacio organizado para el aprendizaje a distancia. Su interfaz intuitiva y su integraci&oacute;n con otros servicios de Google lo convierten en una opci&oacute;n popular para instituciones educativas de todo el mundo.\r\n\r\nAdem&aacute;s de las tareas, los docentes pueden gestionar las calificaciones, ofrecer retroalimentaci&oacute;n personalizada y fomentar la interacci&oacute;n en tiempo real mediante la integraci&oacute;n de videollamadas. Google Classroom tambi&eacute;n facilita la entrega de materiales de estudio, lo que permite a los estudiantes acceder a los recursos de forma sencilla. Esta plataforma se ha convertido en una herramienta esencial para la educaci&oacute;n a distancia y h&iacute;brida, adapt&aacute;ndose a las nuevas necesidades del aprendizaje moderno.\r\n\r\nLos administradores pueden configurar el acceso y la seguridad para garantizar que los estudiantes solo interact&uacute;en con los materiales y compa&ntilde;eros permitidos. La versatilidad de Google Classroom permite que tanto en el &aacute;mbito escolar como en el universitario, sea una herramienta indispensable para la organizaci&oacute;n del aprendizaje digital. Adem&aacute;s, su compatibilidad con dispositivos m&oacute;viles permite a los estudiantes continuar su educaci&oacute;n desde cualquier lugar y en cualquier momento, promoviendo la flexibilidad y la accesibilidad.\r\n\r\nEn cuanto a la evaluaci&oacute;n, Google Classroom facilita la creaci&oacute;n de ex&aacute;menes y cuestionarios personalizados, que pueden ser calificados autom&aacute;ticamente o revisados manualmente por los docentes. Esto reduce el tiempo invertido en la correcci&oacute;n y mejora la eficiencia del proceso educativo. Por lo tanto, es una opci&oacute;n integral tanto para la ense&ntilde;anza tradicional como para la educaci&oacute;n en l&iacute;nea, brindando una experiencia educativa completa y din&aacute;mica.', '1733796639classroom.jpeg', '2024-12-09 21:21:22', 6, 5, 1),
(15, 'Shopify', 'Shopify es una de las plataformas de comercio electr&oacute;nico m&aacute;s populares del mundo, dise&ntilde;ada para ayudar a las empresas a crear y gestionar su tienda online de manera eficiente. Con una interfaz amigable, Shopify permite a los usuarios vender productos, gestionar inventarios, procesar pagos y realizar un seguimiento de sus ventas sin necesidad de conocimientos t&eacute;cnicos avanzados. La plataforma ofrece una amplia gama de herramientas personalizables que permiten a las empresas crear una experiencia de compra &uacute;nica para sus clientes.\r\n\r\nAdem&aacute;s de sus funcionalidades b&aacute;sicas, Shopify se integra con varias aplicaciones y servicios de terceros, lo que permite a los comerciantes expandir las capacidades de su tienda en l&iacute;nea. Entre las caracter&iacute;sticas clave de Shopify se incluyen plantillas personalizables, sistemas de pago integrados, opciones de marketing digital, gesti&oacute;n de pedidos y env&iacute;os, as&iacute; como la optimizaci&oacute;n para dispositivos m&oacute;viles. La plataforma es ideal tanto para peque&ntilde;as empresas como para grandes marcas que buscan escalabilidad y facilidad de uso.\r\n\r\nShopify tambi&eacute;n ofrece soluciones espec&iacute;ficas para diversos tipos de negocios, incluyendo tiendas f&iacute;sicas, ventas por suscripci&oacute;n y comercio en redes sociales. Gracias a su funcionalidad multicanal, los comerciantes pueden vender no solo en sus sitios web, sino tambi&eacute;n en plataformas como Instagram, Facebook y Amazon, ampliando su alcance y mejorando las oportunidades de venta. Adem&aacute;s, Shopify facilita la implementaci&oacute;n de estrategias de marketing, desde la creaci&oacute;n de campa&ntilde;as por correo electr&oacute;nico hasta la optimizaci&oacute;n SEO y la gesti&oacute;n de anuncios en redes sociales.\r\n\r\nLa flexibilidad de Shopify permite a los emprendedores y empresas de todos los tama&ntilde;os construir una tienda en l&iacute;nea sin la necesidad de desarrollar un sitio web desde cero. Su sistema de gesti&oacute;n de inventarios y an&aacute;lisis de ventas proporciona informaci&oacute;n valiosa para mejorar la toma de decisiones y optimizar los procesos operativos. Con su creciente ecosistema de aplicaciones y soporte para m&aacute;s de 175 pa&iacute;ses, Shopify es una soluci&oacute;n integral para gestionar negocios de comercio electr&oacute;nico en un mercado globalizado.', '1733797626pos4.jpeg', '2024-12-10 02:27:06', 8, 5, 0),
(16, 'Oracle SCM Cloud', 'Oracle SCM Cloud es una soluci&oacute;n integral basada en la nube que optimiza la gesti&oacute;n de la cadena de suministro, permitiendo a las empresas gestionar sus operaciones de manera m&aacute;s eficiente. Este sistema de informaci&oacute;n proporciona una plataforma unificada para planificar, ejecutar y monitorear todas las actividades relacionadas con la cadena de suministro, desde la adquisici&oacute;n de materiales hasta la distribuci&oacute;n de productos.\r\n\r\nCon Oracle SCM Cloud, las organizaciones pueden mejorar la visibilidad de sus operaciones a trav&eacute;s de un tablero de control centralizado, lo que facilita la toma de decisiones informadas en tiempo real. La plataforma permite automatizar tareas, mejorar la planificaci&oacute;n de la demanda, optimizar inventarios y reducir costos operativos, lo que resulta en un flujo de trabajo m&aacute;s &aacute;gil y rentable.\r\n\r\nEl sistema incluye m&oacute;dulos para la gesti&oacute;n de la cadena de suministro, como el aprovisionamiento de materiales, la gesti&oacute;n de la producci&oacute;n, la log&iacute;stica, el seguimiento de pedidos, la gesti&oacute;n de almacenes y la visibilidad de la red de distribuci&oacute;n. Adem&aacute;s, Oracle SCM Cloud se integra perfectamente con otros sistemas ERP y aplicaciones, ofreciendo una soluci&oacute;n completa que abarca todo el ciclo de vida de la cadena de suministro.\r\n\r\nLa plataforma tambi&eacute;n permite a las empresas adaptarse a las demandas cambiantes del mercado mediante el uso de an&aacute;lisis predictivos y herramientas de inteligencia artificial, que ayudan a anticipar posibles interrupciones en la cadena de suministro y a tomar decisiones proactivas. A trav&eacute;s de sus capacidades avanzadas de an&aacute;lisis y colaboraci&oacute;n, Oracle SCM Cloud facilita la coordinaci&oacute;n entre los diferentes actores de la cadena de suministro, mejorando la eficiencia y la satisfacci&oacute;n del cliente.\r\n\r\nAl ser una soluci&oacute;n en la nube, Oracle SCM Cloud tambi&eacute;n ofrece la flexibilidad de acceder a datos y herramientas desde cualquier lugar, permitiendo a las empresas gestionar sus operaciones globales con facilidad. Adem&aacute;s, su capacidad de escalabilidad la convierte en una opci&oacute;n ideal tanto para peque&ntilde;as empresas como para grandes corporaciones que buscan optimizar sus cadenas de suministro de manera efectiva.\r\n\r\nEn resumen, Oracle SCM Cloud es una herramienta poderosa para empresas que buscan mejorar la eficiencia operativa, reducir costos y mejorar la colaboraci&oacute;n en su cadena de suministro, adapt&aacute;ndose r&aacute;pidamente a un entorno empresarial global y competitivo.', '1733798051oracle.jpeg', '2024-12-10 02:34:11', 7, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(5, 'York', 'Mendoza Rojas', 'york', 'york@gmail.com', '$2y$10$LQQpPFSsA4mvTXfnadSvIOt3FvGBWWVT1R/ST5dS6z2j/i27e6lNS', '1733614959avatar11.jpg', 1),
(11, 'Franklin', 'Gomez Mendoza', 'franklin', 'franklin@gmail.com', '$2y$10$U5zr1e64Gep8FhTq/G5mUOCiNt5zDpLAi3JzIBNWVNSZCBSnK5cEK', '1733681762avatar13.jpg', 0),
(13, 'Pepe', 'Jorge Gutierrez', 'pepe', 'pepito@hotmail.com', '$2y$10$wfZeTIUwvvZv3PY9ub0BCOLJeow00oJXusTkHSBI3UV2frDFd2pqG', '1733793764avatar8.jpg', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
