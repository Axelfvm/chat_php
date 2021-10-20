/*
 Navicat Premium Data Transfer

 Source Server         : LocalHost
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : login

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 20/10/2021 11:50:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for painel
-- ----------------------------
DROP TABLE IF EXISTS `painel`;
CREATE TABLE `painel`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `cadastro_enable` int(2) NOT NULL DEFAULT 0,
  `manutencao` int(2) NOT NULL DEFAULT 0,
  `n_chat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cor_fundo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `debug` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of painel
-- ----------------------------
INSERT INTO `painel` VALUES (1, 1, 0, 'zChat', '#d4d4d4', '');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `autor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `oculto` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 299 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` text CHARACTER SET latin1 COLLATE latin1_general_ci NULL,
  `usuario` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `senha` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `su` int(10) NOT NULL DEFAULT 0,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `lastIP` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `sexo` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `idade` int(3) NULL DEFAULT NULL,
  `pais` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ban` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 43 CHARACTER SET = latin1 COLLATE = latin1_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (30, 'testado', 'axel', '$2y$10$qUH6JuyvRHLOG11beIdvFuxF6/3X.A4.07Pfq0j1PdElnuIEmDgqq', 0, '', '168.227.57.150', 'Feminino', 20, 'Brasil', 0);
INSERT INTO `usuarios` VALUES (22, 'Administrador', 'admin', '$2y$10$/gGI0HCDTPeeLgy4Zkw.SuD/2ejUHutMxp0nc.An/GiWweVBHlYbm', 10, 'admin@hotmail.com', '168.227.57.150', 'Masculino', 25, 'Brasil', 0);

SET FOREIGN_KEY_CHECKS = 1;
