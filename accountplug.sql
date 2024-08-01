/*
 Navicat Premium Data Transfer

 Source Server         : accountbot
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : app

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 01/08/2024 21:43:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `cost` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quantity` int NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cart
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orders_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `cost` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `paid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('01e77b11-7f18-4261-b3b1-7c0f115825ff', '2e6f9bb7-f239-4528-af64-be904a79ce64', 32, '14.99', 'UNPAID', '2024-08-01 21:23:02', '2024-08-01 21:23:02');
INSERT INTO `order` VALUES ('0cbb8326-f60a-4f32-a1de-f98f55bae1f6', '2e6f9bb7-f239-4528-af64-be904a79ce64', 32, '9.99', 'UNPAID', '2024-08-01 21:23:02', '2024-08-01 21:23:02');
INSERT INTO `order` VALUES ('1f574383-4385-44b3-9331-6e816e6383e2', '2e6f9bb7-f239-4528-af64-be904a79ce64', 32, '9.99', 'UNPAID', '2024-08-01 21:23:02', '2024-08-01 21:23:02');
INSERT INTO `order` VALUES ('4e1802a0-66d1-4f2e-999d-2fb0927a75c6', 'b9ba1d00-1bf8-49a1-bb65-0ec85e64049d', 32, '9.99', 'UNPAID', '2024-08-01 21:37:40', '2024-08-01 21:37:40');
INSERT INTO `order` VALUES ('4f7a87ad-a9f7-4d51-9735-9ff9f7006c3a', '2e6f9bb7-f239-4528-af64-be904a79ce64', 32, '14.99', 'UNPAID', '2024-08-01 21:23:02', '2024-08-01 21:23:02');
INSERT INTO `order` VALUES ('5d6771ee-3e1b-484b-96ce-b7187294aa43', '799061b9-bb45-491c-a91c-0ca9319ea16e', 32, '9.99', 'UNPAID', '2024-08-01 21:41:27', '2024-08-01 21:41:27');
INSERT INTO `order` VALUES ('c2fb02d3-f071-4f56-846e-413c2c8e9296', '799061b9-bb45-491c-a91c-0ca9319ea16e', 32, '9.99', 'UNPAID', '2024-08-01 21:41:27', '2024-08-01 21:41:27');
INSERT INTO `order` VALUES ('c8ec0cf6-f48e-4d54-845b-674786aab99a', '2e6f9bb7-f239-4528-af64-be904a79ce64', 32, '14.99', 'UNPAID', '2024-08-01 21:23:02', '2024-08-01 21:23:02');
INSERT INTO `order` VALUES ('e2aa8b08-74ec-41f6-92ec-9e68b1d4e519', 'b9ba1d00-1bf8-49a1-bb65-0ec85e64049d', 32, '9.99', 'UNPAID', '2024-08-01 21:37:40', '2024-08-01 21:37:40');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT ' ',
  `user_id` int NULL DEFAULT NULL,
  `cost` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quantity` int NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('2e6f9bb7-f239-4528-af64-be904a79ce64', 32, NULL, NULL, '61.7025', 'UNPAID', '2024-08-01 21:23:02', '2024-08-01 21:23:02');
INSERT INTO `orders` VALUES ('60060139-b440-4f6b-990b-ae4228f74f62', 32, NULL, NULL, '0', 'UNPAID', '2024-08-01 21:25:31', '2024-08-01 21:25:31');
INSERT INTO `orders` VALUES ('799061b9-bb45-491c-a91c-0ca9319ea16e', 32, NULL, NULL, '18.981', 'UNPAID', '2024-08-01 21:41:27', '2024-08-01 21:41:27');
INSERT INTO `orders` VALUES ('b9ba1d00-1bf8-49a1-bb65-0ec85e64049d', 32, NULL, NULL, '18.981', 'UNPAID', '2024-08-01 21:37:40', '2024-08-01 21:37:40');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AccountID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (32, 'Mark', 'markloughlingm@gmail.com', '9ad56dffcdd6ce58c1fadb12532a53a3', '080d8828bf02ae73e453dcce6d771435', '7a848fa4be22db6f8f0ebcd3c7c3af16', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
