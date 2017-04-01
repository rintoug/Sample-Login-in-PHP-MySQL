CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `created_at`) VALUES
(2, 'John Doe', 'john@email.com', '$2y$10$dQroKbxGxg5LlczsImc1pOq798ssyG4Rwy6leETAvbd4XDqMu/RXG', '2017-04-01 00:00:00');

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;