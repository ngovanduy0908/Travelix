CREATE TABLE `role` (
  `id` int,
  `name` varchar(255)
);

CREATE TABLE `users` (
  `id` int,
  `role_id` int,
  `username` varchar(255),
  `fullname` varchar(255),
  `password` varchar(255),
  `email` varchar(255),
  `phone_number` varchar(255),
  `thumbnail` varchar(255),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `places` (
  `id` int,
  `title` varchar(255),
  `price` int,
  `thumbnail` varchar(255),
  `description` varchar(255),
  `point` float,
  `rating` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `book` (
  `id` int,
  `user_id` int,
  `place_id` int,
  `hotel_id` int,
  `status` int,
  `sum` float
);

CREATE TABLE `historyTicket` (
  `id` int,
  `user_id` int,
  `place_id` int,
  `hotel_id` int,
  `status` int,
  `sum` int,
  `month` int,
  `year` int
);

CREATE TABLE `contact` (
  `id` int,
  `firstname` varchar(50),
  `lastname` varchar(50),
  `email` varchar(255),
  `phone_number` varchar(255),
  `subject` varchar(255),
  `note` varchar(255),
  `status` int
);

CREATE TABLE `hotel` (
  `id` int,
  `place_id` int,
  `name` varchar(255),
  `price` int,
  `day` int,
  `rating` int,
  `thumbnail` varchar(255),
  `created_at` datetime,
  `updated_at` datetime
);

ALTER TABLE `book` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `book` ADD FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

ALTER TABLE `users` ADD FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

ALTER TABLE `hotel` ADD FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

ALTER TABLE `book` ADD FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

ALTER TABLE `historyTicket` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `historyTicket` ADD FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

ALTER TABLE `historyTicket` ADD FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);
