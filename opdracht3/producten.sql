

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `producten` (
  `product_code` int(11) NOT NULL,
  `product_naam` varchar(255) NOT NULL,
  `prijs_per_stuk` decimal(10,2) NOT NULL,
  `omschrijving` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `producten` (`product_code`, `product_naam`, `prijs_per_stuk`, `omschrijving`) VALUES
(1, 'Prei', '1.99', 'groente'),
(2, 'Broccoli', '3.49', 'groente'),
(3, 'Aardappel 1,5kg', '5.59', 'groente'),
(4, 'Sla ', '0.49', 'groente'),
(5, 'Wortel 1kg', '2.99', 'groente');


ALTER TABLE `producten`
  ADD PRIMARY KEY (`product_code`);


ALTER TABLE `producten`
  MODIFY `product_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

