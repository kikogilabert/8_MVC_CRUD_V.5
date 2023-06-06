-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2023 a las 19:01:09
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `egocars`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE `brand` (
  `cod_brand` varchar(100) DEFAULT NULL,
  `desc_brand` varchar(100) DEFAULT NULL,
  `img_brand` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`cod_brand`, `desc_brand`, `img_brand`) VALUES
('Audi', 'Description', 'view/img/cars/audi1.png'),
('BMW', 'Description', 'view/img/cars/bmw1.png'),
('Chevrolet', 'Description', 'view/img/cars/chevrolet1.png'),
('Citroen', 'Description', 'view/img/cars/citroen1.png'),
('Dacia', 'Description', 'view/img/cars/dacia1.png'),
('Ferrari', 'Description', 'view/img/cars/ferrari1.png'),
('Fiat', 'Description', 'view/img/cars/fiat1.png'),
('Ford', 'Description', 'view/img/cars/ford1.png'),
('Honda', 'Description', 'view/img/cars/honda1.png'),
('Hyundai', 'Description', 'view/img/cars/hyundai1.png'),
('Infiniti', 'Description', 'view/img/cars/infiniti1.png'),
('Jaguar', 'Description', 'view/img/cars/jaguar1.png'),
('Lamborghini', 'Description', 'view/img/cars/lambo1.png'),
('Land Rover', 'Description', 'view/img/cars/landrover1.png'),
('Lexus', 'Description', 'view/img/cars/lexus1.png'),
('Mazda', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Mercedes', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Mini', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Nissan', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Opel', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Peugot', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Porsche', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Renault', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Seat', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Suabru', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Suzuki', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Tesla', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Volkswagen', 'Description', 'https://api.lorem.space/image/car?w=350&h=225'),
('Volvo', 'Description', 'https://api.lorem.space/image/car?w=350&h=225');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `car`
--

CREATE TABLE `car` (
  `license_number` varchar(18) DEFAULT NULL,
  `car_plate` varchar(8) DEFAULT NULL,
  `km` int(8) DEFAULT NULL,
  `model` int(8) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `motor_type` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `doors` varchar(20) DEFAULT NULL,
  `registration_date` varchar(15) DEFAULT NULL,
  `sticker` varchar(20) DEFAULT NULL,
  `price` int(8) DEFAULT NULL,
  `img_car` varchar(300) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upload_date` varchar(10) NOT NULL,
  `cv` int(10) NOT NULL,
  `cc` int(11) DEFAULT NULL,
  `lat` varchar(10) NOT NULL,
  `lon` varchar(10) NOT NULL,
  `city` varchar(255) DEFAULT 'Puerto Rico',
  `visit_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `car`
--

INSERT INTO `car` (`license_number`, `car_plate`, `km`, `model`, `category`, `motor_type`, `color`, `doors`, `registration_date`, `sticker`, `price`, `img_car`, `address`, `upload_date`, `cv`, `cc`, `lat`, `lon`, `city`, `visit_count`) VALUES
('ALOEGLSEO34782341', '1393ABC', 1300000, 1, 'KM0', 'D', 'Blue', '5', '10/01/2015', 'B', 17000, 'view/img/cars/audi_a1.png', 'Calle Valencia', '21/11/2020', 230, 5000, '42.6315642', '1.50094868', 'Oliva', 174),
('KIOEGLSEO34782341', '0343ABC', 10000, 10, 'OF', 'E', 'white', '5', '10/01/2015', 'C', 34000, 'view/img/cars/mercedes_cc1.png', 'Carrer Dels Anecs', '20/10/2022', 320, 5000, '38.9236730', '-0.1088941', 'Bocairent', 4),
('KIKOGLSEO34782300', '1234QWE', 40000, 6, 'NEW', 'G', 'black', '5', '10/01/2015', 'C', 54000, 'view/img/cars/bmw_s3.png', 'Carrer Dels Anecs', '20/10/2022', 220, 4000, '41.0594537', '-2.1462978', 'Valencia', 25),
('OSOEGLSEO34782341', '6789ZXC', 1000, 2, 'NEW', 'H', 'white', '5', '10/01/2022', '0', 50000, 'view/img/cars/audi_q5.png', 'Carrer Dels Anecs', '20/10/2022', 320, 5000, '38.8216097', '-0.5980694', 'Ontinyent', 3),
('CANIGLSEO34782341', '7777ZZZ', 100000, 14, 'OF', 'G', 'red', '5', '10/01/2023', 'C', 19000, 'view/img/cars/seat_leon1.png', 'Carrer Valencia', '20/10/2023', 420, 5000, '38.9234936', '-0.1082740', 'Granada', 66),
('CHEVGLSEO34782341', '6543HJK', 23000, 21, 'RT', 'D', 'yellow', '3', '10/01/2004', 'B', 64000, 'view/img/cars/chevrolet_cam1.png', 'Carrer Dels Anecs', '20/01/2023', 620, 5200, '38.7638276', '-0.6162789', 'Santa Cruz de Tenerife', 5),
('RANGERSEO34782341', '1239JCR', 0, 17, 'KM0', 'D', 'Orange', '5', '10/01/2014', 'B', 41000, 'view/img/cars/ford_ranger1.png', 'Plaça de Sant Vicent', '10/10/2021', 420, 5000, '38.7678663', '-0.6086704', 'Oliva', 3),
('TYPERSEO34782341', '2239JCR', 19000, 22, 'RT', 'G', 'White', '5', '10/01/2017', 'B', 34000, 'view/img/cars/honda_civic1.png', 'Carrer de la Solana', '10/10/2021', 420, 5000, '42.5437061', '1.73208780', 'Pas de la Casa', 1),
('I30ERSEO34782341', '2222JCR', 22100, 16, 'OF', 'H', 'White', '5', '10/01/2017', 'B', 34000, 'view/img/cars/hyundai_i30N1.png', 'Carrer de la Solana', '10/10/2021', 420, 4000, '41.5437061', '1.73208780', 'Pas de la Casa', 2),
('MINIRSEO34782341', '1924JSR', 15800, 19, 'OF', 'D', 'Red', '3', '10/01/2013', 'C', 39000, 'view/img/cars/mini_cooper1.png', 'Carrer de la Solana', '10/10/2021', 420, 4000, '31.5437061', '1.33208780', 'Pas de la Casa', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `car_plate` varchar(7) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `car_plate`, `qty`) VALUES
(123, 55, '1393ABC', 5),
(124, NULL, 'eyJ0eXA', 1),
(125, NULL, 'eyJ0eXA', 1),
(144, 81, '7777ZZZ', 1),
(154, 98, '1393ABC', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `cod_cat` varchar(11) NOT NULL,
  `name_cat` varchar(25) NOT NULL,
  `desc_cat` varchar(100) DEFAULT NULL,
  `img_cat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`cod_cat`, `name_cat`, `desc_cat`, `img_cat`) VALUES
('KM0', 'Km0', 'The car has 0 km', 'view/img/cars/categoria3.jpg'),
('RT', 'Renting', 'The car can be rented for a month tax', 'view/img/cars/categoria4.jpg'),
('PO', 'Pre-Owned', 'The car has been owned in the past by someone', 'view/img/cars/categoria5.jpg'),
('OF', 'Offer', 'There is a discount in the price', 'view/img/cars/categoria2.jpg'),
('NEW', 'New', 'The car is brand new', 'view/img/cars/categoria1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra`
--

CREATE TABLE `extra` (
  `cod_extra` varchar(15) NOT NULL,
  `desc_cat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE `img` (
  `car_plate` varchar(25) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`car_plate`, `img`) VALUES
('1393ABC', 'view/img/cars/audi_a1_2.jpg'),
('1393ABC', 'view/img/cars/audi_a1_3.jpg'),
('1393ABC', 'view/img/cars/audi_a1_4.jpg'),
('1393ABC', 'view/img/cars/audi_a1_6.jpg'),
('1393ABC', 'view/img/cars/audi_a1_7.jpg'),
('0343ABC', 'view/img/cars/mercedes_cc2.jpg'),
('0343ABC', 'view/img/cars/mercedes_cc3.jpg'),
('0343ABC', 'view/img/cars/mercedes_cc4.jpg'),
('0343ABC', 'view/img/cars/mercedes_cc5.jpg'),
('0343ABC', 'view/img/cars/mercedes_cc6.jpg'),
('0343ABC', 'view/img/cars/mercedes_cc7.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_user` int(30) NOT NULL,
  `car_plate` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id_like`, `id_user`, `car_plate`) VALUES
(167, 56, '7777ZZZ'),
(175, 55, '1393ABC'),
(177, 55, '1234QWE'),
(202, 81, '1234QWE'),
(204, 81, '7777ZZZ'),
(205, 81, '1924JSR'),
(206, 95, '1393ABC'),
(207, 95, '1234QWE'),
(224, 97, '1393ABC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model`
--

CREATE TABLE `model` (
  `cod_model` int(20) NOT NULL,
  `name_model` varchar(25) DEFAULT NULL,
  `desc_model` varchar(255) DEFAULT NULL,
  `cod_brand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `model`
--

INSERT INTO `model` (`cod_model`, `name_model`, `desc_model`, `cod_brand`) VALUES
(1, 'A1', 'Description', 'Audi'),
(2, 'Q5', 'Description', 'Audi'),
(3, 'TT', 'Description', 'Audi'),
(4, 'A3', 'Description', 'Audi'),
(5, 'A7', 'Description', 'Audi'),
(6, 'Serie3', 'Description', 'BMW'),
(7, 'x5', 'Description', 'BMW'),
(8, 'x6', 'Description', 'BMW'),
(9, 'Clase A', 'Description', 'Mercedes'),
(10, 'Clase C', 'Description', 'Mercedes'),
(11, 'Clase G', 'Description', 'Mercedes'),
(12, 'GLE', 'Description', 'Mercedes'),
(13, 'Leon', 'Description', 'Seat'),
(14, 'Ibiza', 'Description', 'Seat'),
(15, 'Tucson', 'Description', 'Hyundai'),
(16, 'i30', 'Description', 'Hyundai'),
(17, 'Ranger', 'Description', 'Ford'),
(18, 'Focus', 'Description', 'Ford'),
(19, 'Cooper', 'Description', 'Mini'),
(20, 'Vitara', 'Description', 'Suzuki'),
(21, 'Camaro', 'This is a description of ', 'Chevrolet'),
(22, 'Civic', 'This is  a description of a Civic', 'Honda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_type`
--

CREATE TABLE `motor_type` (
  `cod_type` varchar(10) NOT NULL,
  `desc_type` varchar(15) NOT NULL,
  `img_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_type`
--

INSERT INTO `motor_type` (`cod_type`, `desc_type`, `img_type`) VALUES
('D', 'Diesel', 'https://api.lorem.space/image/car?w=350&h=225'),
('E', 'Electric', 'https://api.lorem.space/image/car?w=350&h=225'),
('G', 'Gasoline', 'https://api.lorem.space/image/car?w=350&h=225'),
('H', 'Hybrid', 'https://api.lorem.space/image/car?w=350&h=225');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `cod_order` int(11) NOT NULL,
  `cod_user` int(11) DEFAULT NULL,
  `car_plate` varchar(7) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`cod_order`, `cod_user`, `car_plate`, `qty`, `price`, `total_price`, `order_date`) VALUES
(33, 55, '1393ABC', 1, 17000, 17000, '2023-05-01 02:23:30'),
(34, 55, '1234QWE', 1, 54000, 54000, '2023-05-01 02:23:30'),
(35, 55, '7777ZZZ', 1, 19000, 19000, '2023-05-01 02:23:30'),
(36, 55, '1393ABC', 1, 17000, 17000, '2023-05-01 02:25:55'),
(37, 55, '1234QWE', 1, 54000, 54000, '2023-05-01 02:25:55'),
(38, 55, '7777ZZZ', 1, 19000, 19000, '2023-05-01 02:25:55'),
(39, 55, '1393ABC', 1, 17000, 17000, '2023-05-01 02:26:32'),
(40, 55, '1234QWE', 1, 54000, 54000, '2023-05-01 02:26:32'),
(41, 55, '7777ZZZ', 1, 19000, 19000, '2023-05-01 02:26:32'),
(42, 81, '1393ABC', 8, 17000, 136000, '2023-05-30 11:03:52'),
(43, 81, '7777ZZZ', 10, 19000, 190000, '2023-05-30 11:03:52'),
(44, 81, '1393ABC', 1, 17000, 17000, '2023-05-30 11:04:51'),
(45, 81, '1234QWE', 5, 54000, 270000, '2023-05-30 11:04:51'),
(46, 81, '7777ZZZ', 1, 19000, 19000, '2023-05-30 11:04:51'),
(47, 97, '1393ABC', 1, 17000, 17000, '2023-06-05 06:55:08'),
(48, 97, '1234QWE', 5, 54000, 270000, '2023-06-05 06:55:08'),
(49, 97, '7777ZZZ', 1, 19000, 19000, '2023-06-05 06:55:08'),
(50, 97, '1393ABC', 3, 17000, 51000, '2023-06-06 06:31:54'),
(51, 99, '1393ABC', 1, 17000, 17000, '2023-06-06 06:46:57'),
(52, 99, '1234QWE', 1, 54000, 54000, '2023-06-06 06:46:57'),
(53, 99, '7777ZZZ', 2, 19000, 38000, '2023-06-06 06:46:57');

--
-- Disparadores `orders`
--
DELIMITER $$
CREATE TRIGGER `delete_cart_AI` AFTER INSERT ON `orders` FOR EACH ROW BEGIN 
DELETE FROM cart 
WHERE id_user = NEW.cod_user; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(30) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type_user` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `email_token` varchar(250) DEFAULT NULL,
  `activated` int(1) DEFAULT NULL,
  `uid` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `type_user`, `avatar`, `email_token`, `activated`, `uid`) VALUES
(97, 'kikogm204', '', 'kikogm204@gmail.com', 'client', 'https://lh3.googleusercontent.com/a/AAcHTtcAl5ekUAjGCKsf0_HHMQ59y5TytDWIX_hdLtEq=s96-c', '', 1, '9Q1O4qKYqvVivhMHnyd3oIGPsA43'),
(98, 'kiko.gilabertm', '', 'kiko.gilabertm@gmail.com', 'client', 'https://avatars.githubusercontent.com/u/118535012?v=4', '', 1, 'MQeOQa3acNMivb4Yc5XxEkiXl4I3'),
(99, 'yomogan', '$2y$12$TiQAZ87eT3mb8S0BSQrGseLm8lWBmZq3Pgx4/o5Kt5TZSFtNQC/Om', 'kikogm2004@gmail.com', 'client', 'https://placeimg.com/400/400/0adc4fc259c64fdbea78ce44e9ae4ba7', '', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `car_plate` (`car_plate`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`cod_order`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `cod_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
