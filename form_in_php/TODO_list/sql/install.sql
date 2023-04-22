-- Active: 1678437261958@@127.0.0.1@3306@form_in_php

create Table `tasks` (
    `task_id` INT(255) NOT NULL, 
    `user_id` INT(255),
    `name` VARCHAR(255),
    `due_date` DATE,
    `done` BOOLEAN,
    PRIMARY KEY (task_id),
    Foreign Key (user_id) REFERENCES user(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

  ALTER TABLE `tasks`
  MODIFY `task_id` int(255) NOT NULL AUTO_INCREMENT;

  INSERT INTO tasks ( name, due_date, done, user_id) 
                  VALUES ("aaaa", "2023-04-05", false, 10);

  TRUNCATE TABLE `tasks`;

   DROP Table `tasks`;