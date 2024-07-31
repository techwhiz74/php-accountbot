/*
 Navicat Premium Data Transfer

 Source Server         : php-task
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : app

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 31/07/2024 15:33:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for random_urls
-- ----------------------------
DROP TABLE IF EXISTS `random_urls`;
CREATE TABLE `random_urls`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT ' ',
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of random_urls
-- ----------------------------
INSERT INTO `random_urls` VALUES ('005b6eaf002a1d622281fef09a77fb23', '9.99', 'UNPAID', '2024-07-31 11:14:58', '2024-07-31 11:14:58');
INSERT INTO `random_urls` VALUES ('0fcef77f6c171bb4d9c49f951be31a65', '44.97', 'UNPAID', '2024-07-31 12:47:06', '2024-07-31 12:47:06');
INSERT INTO `random_urls` VALUES ('197405a69d997f891e60e0ac4c3873c3', '39.98', 'UNPAID', '2024-07-31 15:17:07', '2024-07-31 15:17:07');
INSERT INTO `random_urls` VALUES ('2eef5e879896a1e06aa9e7b613fd0df0', '14.99', 'UNPAID', '2024-07-31 11:23:00', '2024-07-31 11:23:00');
INSERT INTO `random_urls` VALUES ('399fec03d90972d59fdd4d84dd030ee7', '19.98', 'UNPAID', '2024-07-31 12:43:01', '2024-07-31 12:43:01');
INSERT INTO `random_urls` VALUES ('906bcaea6a151b32666bba39cf9dfd1f', '9.99', 'UNPAID', '2024-07-31 13:05:35', '2024-07-31 13:05:35');
INSERT INTO `random_urls` VALUES ('c787016faf0076a9f44a12ce4a42be3a', '4.99', 'UNPAID', '2024-07-31 12:59:16', '2024-07-31 12:59:16');

-- ----------------------------
-- Table structure for submenu_item
-- ----------------------------
DROP TABLE IF EXISTS `submenu_item`;
CREATE TABLE `submenu_item`  (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu_id` int NULL DEFAULT NULL,
  `badge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of submenu_item
-- ----------------------------
INSERT INTO `submenu_item` VALUES (0, 'item1', 'u', 'item1', 0, 'a,b', 'u', '_blank', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Hildegard Koepp', 'erin.dicki@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'f9j5Qp9BK7', '2024-01-29 11:04:37', '2024-01-29 11:04:37');
INSERT INTO `users` VALUES (2, 'Gertrude Collier', 'samara23@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'O6dTPYfEPO', '2024-01-29 11:04:37', '2024-01-29 11:04:37');
INSERT INTO `users` VALUES (3, 'Prof. Niko McKenzie Sr.', 'anthony58@example.com', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iJi6pyNxpm', '2024-01-29 11:04:37', '2024-01-29 11:04:37');
INSERT INTO `users` VALUES (4, 'Lemuel Kuvalis', 'vernie.emard@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8hLBvXxb5C', '2024-01-29 11:04:37', '2024-01-29 11:04:37');
INSERT INTO `users` VALUES (5, 'Baron Wuckert', 'bonita79@example.org', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CHACS6zAxK', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (6, 'Henri King', 'raymond.stark@example.com', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TFuCgZ7SHl', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (7, 'Miss Daniella Satterfield V', 'alexandra91@example.com', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u1YOxj1ZHP', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (8, 'Paula Towne', 'chelsie47@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fMEzh2G8AZ', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (9, 'Prof. Lula Fadel', 'lesch.wilford@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'p7LiAbns0n', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (10, 'Rebeca Franecki II', 'paucek.loma@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5VBmO4rXeL', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (11, 'Ms. Name Collins Jr.', 'stracke.adolphus@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MlDvrM7JEi', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (12, 'Prof. Amir Heaney', 'ybeatty@example.com', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JoJP1hJ9lG', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (13, 'Rubie Ullrich', 'marian30@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pK1XcqHiTF', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (14, 'Tianna Russel', 'kemmer.leola@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YXDl9eftbm', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (15, 'Zechariah Abshire', 'morton22@example.org', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cdnzUPpiNc', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (16, 'Dr. Kraig Kris PhD', 'flegros@example.org', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AIchgVBH0V', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (17, 'Milton O\'Connell', 'charlotte.kautzer@example.com', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DeLcJeZJyL', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (18, 'Bradford Gutmann', 'russel.emmalee@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zdYsmKkZOv', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (19, 'Ms. Lucinda Dickens', 'vickie32@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uSxsLwoiPp', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (20, 'Rubye McLaughlin', 'mollie53@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '49DBYqakLw', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (21, 'Myra Miller', 'ihomenick@example.org', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PPVjSAzQcy', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (22, 'Dr. Nellie Grady MD', 'vroob@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RmrotfeSYt', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (23, 'Mrs. Simone Johnston', 'alanna.ohara@example.org', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qLh2c0gv4d', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (24, 'Prof. Savanah Blick I', 'camille54@example.com', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ff7N0fFRyd', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (25, 'Mr. Norwood Auer Sr.', 'rubie.bergstrom@example.org', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1XOhHs3jnA', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (26, 'Miss Clarissa Denesik IV', 'langworth.rebekah@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XGZPdBb8Qp', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (27, 'Prof. Edwina Monahan', 'paucek.jerrod@example.org', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QqGDPPvQGb', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (28, 'Ms. Camylle Nicolas', 'cbraun@example.com', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tT4nxwqou5', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (29, 'Mr. Marques Romaguera Sr.', 'rutherford.adela@example.net', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'l3GsbGmbBt', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (30, 'Prof. Joan Wisozk', 'schoen.talia@example.org', '2024-01-29 11:04:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '004u55zVMT', '2024-01-29 11:04:38', '2024-01-29 11:04:38');
INSERT INTO `users` VALUES (31, 'Mark', 'markloughlingm@gmail.com', NULL, '9ad56dffcdd6ce58c1fadb12532a53a3', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
