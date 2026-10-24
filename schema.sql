CREATE DATABASE IF NOT EXISTS wepoghe_labs
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE wepoghe_labs;

CREATE TABLE IF NOT EXISTS enquiries (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(190) NOT NULL,
  service VARCHAR(80) NOT NULL,
  message TEXT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_enquiries_created_at (created_at)
) ENGINE=InnoDB;
