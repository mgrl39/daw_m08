```sql
CREATE DATABASE IF NOT EXISTS api;
```
```sql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `User` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(320) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `phone` text NOT NULL,
  `born` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;
```
