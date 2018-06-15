/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : thoitrang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-06-15 17:41:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for access
-- ----------------------------
DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `access` text CHARACTER SET utf8,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of access
-- ----------------------------
INSERT INTO `access` VALUES ('1', '11', '{\"product\":[\"products\",\"add\",\"edit\",\"delete\",\"categories\",\"cat_add\",\"cat_edit\",\"cat_delete\"]}');
INSERT INTO `access` VALUES ('2', '12', '{\"menu\":[\"menulist\",\"add\",\"edit\",\"delete\"]}');
INSERT INTO `access` VALUES ('3', '2', '{\"product\":[\"products\",\"category_pro\",\"add\",\"delete_once\",\"cat_add\",\"del_cat_once\",\"delete_once_comment\",\"delete_once_question\"],\"order\":[\"orders\"],\"news\":[\"newslist\",\"categories\",\"tagsnews\",\"addnews\",\"delete_once_news\",\"cat_add_news\",\"del_catnews_once\"],\"menu\":[\"addmenu\",\"menulist\",\"delete\"],\"imageupload\":[\"banners\",\"addbanner\",\"delete_Banner_once\"],\"pages\":[\"pagelist\",\"addpage\",\"delete_page_once\"],\"contact\":[\"contacts\",\"delete\"],\"email\":[\"emails\",\"delete\"],\"admin\":[\"site_option\",\"maps\",\"store_shopping\"]}');
INSERT INTO `access` VALUES ('4', '1', '{\"inuser\":[\"categories\",\"cate_add\",\"delete_cat_once\"],\"media\":[\"listAll\",\"categories\",\"add\",\"delete_once\",\"cat_add\",\"del_cat_once\"],\"video\":[\"listAll\",\"category_video\",\"add\",\"delete_once\",\"cat_add\",\"del_cat_once\"],\"product\":[\"products\",\"category_pro\",\"config\",\"add\",\"delete_once\",\"cat_add\",\"del_cat_once\",\"delete_once_comment\",\"delete_once_question\"],\"order\":[\"orders\",\"listSale\",\"listProvince\",\"delete_once_orders\",\"addSale\",\"del_once_sale\"],\"attribute\":[\"listBrand\",\"listLocale\",\"listColor\",\"listprice\",\"listOption\",\"addbrand\",\"delete_brand_once\",\"addlocale\",\"delete_locale_once\",\"addcolor\",\"delete_color_once\",\"addprice\",\"delete_price_once\",\"addoption\",\"delete_option_once\"],\"news\":[\"newslist\",\"categories\",\"tagsnews\",\"addnews\",\"delete_once_news\",\"cat_add_news\",\"del_catnews_once\"],\"tag\":[\"listnew\",\"listpro\"],\"menu\":[\"addmenu\",\"menulist\",\"delete\"],\"comment\":[\"comments\",\"questions\"],\"imageupload\":[\"banners\",\"addbanner\",\"delete_Banner_once\"],\"pages\":[\"pagelist\",\"addpage\",\"delete_page_once\"],\"contact\":[\"contacts\",\"delete\"],\"raovat\":[\"listraovat\",\"categories\",\"tagtinrao\",\"add\",\"delete_raovat_once\",\"cat_add\",\"del_cattinrao_once\"],\"email\":[\"emails\",\"delete\"],\"support\":[\"listSuport\",\"add\",\"delete_support_once\"],\"users\":[\"listuser_admin\",\"listusers\",\"add_users\",\"smslist\"],\"admin\":[\"site_option\",\"maps\",\"store_shopping\",\"setup_product\"],\"province\":[\"listDistric\",\"listWard\",\"street\"],\"report\":[\"soldout\",\"bestsellers\"]}');
INSERT INTO `access` VALUES ('5', '580', '{\"admin\":[\"\",\"site_option\",\"inuser\",\"comment\",\"email\",\"contact\"],\"users\":[\"delete\"],\"order\":[\"orders\",\"Deleteeorder\"],\"support\":[\"add\",\"edit\",\"x\\u00f3a\"],\"product\":[\"products\",\"add\",\"edit\",\"delete\",\"categories\",\"cat_add\",\"cat_edit\",\"listCodeSale\",\"cat_delete\",\"images\"],\"news\":[\"newslist\",\"add\",\"edit\",\"delete\",\"categories\",\"cat_add\",\"cat_edit\",\"delete_cat\"],\"pages\":[\"pagelist\",\"add\",\"edit\",\"delete\",\"action\"],\"menu\":[\"menulist\",\"add\",\"edit\",\"delete\"]}');
INSERT INTO `access` VALUES ('6', '612', '{\"media\":[\"listAll\",\"categories\"],\"video\":[\"listAll\",\"category_video\",\"add\",\"delete_once\",\"cat_add\",\"del_cat_once\"]}');
INSERT INTO `access` VALUES ('7', '636', '{\"product\":[\"products\",\"category_pro\",\"add\",\"delete_once\",\"cat_add\",\"del_cat_once\",\"delete_once_comment\",\"delete_once_question\"],\"order\":[\"orders\",\"listSale\",\"listProvince\",\"delete_once_orders\",\"addSale\",\"del_once_sale\"],\"news\":[\"newslist\",\"categories\",\"tagsnews\",\"addnews\",\"delete_once_news\",\"cat_add_news\",\"del_catnews_once\"],\"users\":[\"listuser_admin\",\"listusers\",\"delete_users_once\",\"add_users\"],\"admin\":[\"site_option\",\"maps\",\"store_shopping\"]}');

-- ----------------------------
-- Table structure for alias
-- ----------------------------
DROP TABLE IF EXISTS `alias`;
CREATE TABLE `alias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` char(50) CHARACTER SET utf8 DEFAULT NULL,
  `item_id` int(11) DEFAULT '0',
  `new_cat` int(11) DEFAULT '0',
  `new` int(11) DEFAULT '0',
  `pro_cat` int(11) DEFAULT '0',
  `pro` int(11) DEFAULT '0',
  `page` int(11) DEFAULT '0',
  `m_cat` int(11) DEFAULT '0',
  `media` int(11) DEFAULT '0',
  `locale` int(11) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `inuser` int(11) DEFAULT NULL,
  `video_cat` int(11) DEFAULT NULL,
  `video` int(11) DEFAULT NULL,
  `services_cat` int(11) DEFAULT NULL,
  `services` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=322 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of alias
-- ----------------------------
INSERT INTO `alias` VALUES ('10', 'gioi-thieu', 'page', '0', '0', '0', '0', '0', '31', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('53', 'mua-tu-xa', 'page', '0', '0', '0', '0', '0', '32', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('54', 'chung-nhan', 'page', '0', '0', '0', '0', '0', '33', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('55', 'dai-ly', 'page', '0', '0', '0', '0', '0', '34', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('19', 'tin-tuc-su-kien', 'cate-new', '0', '3', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('197', 'vay-xoe-nu', 'cate-pro', '0', '0', '0', '27', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('198', 'ao-phao', 'cate-pro', '0', '0', '0', '28', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('199', 'ao-long', 'cate-pro', '0', '0', '0', '29', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('201', 'vay-nu-xoe-h01', 'pro', '0', '0', '0', '0', '112', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('202', 'vay-nu-xoe-h02', 'pro', '0', '0', '0', '0', '113', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('203', 'vay-nu-xoe-h03', 'pro', '0', '0', '0', '0', '114', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('61', 'doi-pho-voi-thuc-pham-ban-bang-su-hieu-biet', 'new', '0', '0', '6', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('58', 'giao-luu-truc-tuyen-nguon-rau-sach-cho-bua-com-gia-dinh', 'new', '0', '0', '3', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('59', 'lo-muc-dau-tu-khung-cua-ty-phu-pham-nhat-vuong-vao-nong-nghiep', 'new', '0', '0', '4', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('60', 'se-co-phuong-tien-kiem-tra-nhanh-thuc-pham-tai-cho', 'new', '0', '0', '5', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('216', 'ao-long-nu', 'cate-pro', '0', '0', '0', '35', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('81', 'up-anh-jpeg-cha-le-khong-duoc-12', 'media', '0', '0', '0', '0', '0', '0', '0', '11', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('84', 'san-pham-cham-soc-toc-nao-tot', 'new', '0', '0', '7', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('85', 'dien-vien-vu-tuan-viet-chuong-phong-cach-thoi-trang-khoe-khoan', 'new', '0', '0', '8', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('86', 'hinh-anh', 'm-cat', '0', '0', '0', '0', '0', '0', '1', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('87', 'bai-hat-gianh-cho-nguoi-dang-yeu', 'video', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, '2', null, null);
INSERT INTO `alias` VALUES ('88', 'danh-muc-video-cua-nam-2018', 'video-cat', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '4', null, null, null);
INSERT INTO `alias` VALUES ('89', 'ban-nha-tai-ha-noi-viet-nam', 'services', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '3');
INSERT INTO `alias` VALUES ('90', 'khac', 'cate-ser', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, '42', null);
INSERT INTO `alias` VALUES ('177', 'danh-muc-1', 'cate-pro', '0', '0', '0', '26', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('225', 'ao-long-vu-h12', 'pro', '0', '0', '0', '0', '125', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('224', 'ao-long-cuu-h11', 'pro', '0', '0', '0', '0', '124', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('214', 'bo-do-ngu', 'cate-pro', '0', '0', '0', '33', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('215', 'bo-do-ngu-nu', 'cate-pro', '0', '0', '0', '34', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('218', 'vay-nu', 'cate-pro', '0', '0', '0', '37', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('217', 'ao-phao-nu', 'cate-pro', '0', '0', '0', '36', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('226', 'ao-long-cuu-h13', 'pro', '0', '0', '0', '0', '126', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('219', 'do-ngu-nu-h27', 'pro', '0', '0', '0', '0', '119', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('220', 'bo-ngu-nu-h23', 'pro', '0', '0', '0', '0', '120', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('221', 'bo-ngu-nu-h24', 'pro', '0', '0', '0', '0', '121', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('222', 'bo-ngu-nu-h13', 'pro', '0', '0', '0', '0', '122', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('223', 'bo-ngu-nu-h26', 'pro', '0', '0', '0', '0', '123', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('227', 'ao-long-vu-h14', 'pro', '0', '0', '0', '0', '127', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('228', 'ao-long-tho-h15', 'pro', '0', '0', '0', '0', '128', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('229', 'ao-phao-dang-dai-h17', 'pro', '0', '0', '0', '0', '129', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('230', 'ao-phao-dang-dai-h18', 'pro', '0', '0', '0', '0', '130', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('231', 'ao-phao-dang-dai-h19', 'pro', '0', '0', '0', '0', '131', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('232', 'ao-dang-ngan-h20', 'pro', '0', '0', '0', '0', '132', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('233', 'ao-phao-dang-ngan-h21', 'pro', '0', '0', '0', '0', '133', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('234', 'ao-phao-dang-ngan-h22', 'pro', '0', '0', '0', '0', '134', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('235', 'ao-sieu-nhe-h23', 'pro', '0', '0', '0', '0', '135', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('236', 'quan-jeans1', 'cate-pro', '0', '0', '0', '38', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('237', 'quan-jeans', 'cate-pro', '0', '0', '0', '39', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('238', 'quan-jeans-1', 'cate-pro', '0', '0', '0', '40', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('240', 'quan-short-hoa-hong-b9821', 'pro', '0', '0', '0', '0', '136', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('241', 'quan-short-jeans-cao-cap-b2821', 'pro', '0', '0', '0', '0', '137', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('242', 'quan-short-jeans-hoa-hong-b9821', 'pro', '0', '0', '0', '0', '138', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('243', 'quan-short-jeans-tai-cau-giay-b805', 'pro', '0', '0', '0', '0', '139', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('244', 'quan-short-jeans-b2820', 'pro', '0', '0', '0', '0', '140', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('245', 'quan-sooc-nu-b2821', 'pro', '0', '0', '0', '0', '141', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('300', 'ao-len-l01', 'pro', '0', '0', '0', '0', '180', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('246', 'quan-jeans-dui', 'cate-pro', '0', '0', '0', '42', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('251', 'ao-phong', 'cate-pro', '0', '0', '0', '47', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('252', 'quan-yem-jeans-b5823', 'pro', '0', '0', '0', '0', '142', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('249', 'vay-yem', 'cate-pro', '0', '0', '0', '45', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('250', 'vay-yem-jeans', 'cate-pro', '0', '0', '0', '46', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('253', 'quan-yem-jeans-b5823', 'pro', '0', '0', '0', '0', '143', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('254', 'maxi', 'cate-pro', '0', '0', '0', '48', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('255', 'vay-yem-jeans-dep-b9291', 'pro', '0', '0', '0', '0', '144', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('256', 'vay-maxi', 'cate-pro', '0', '0', '0', '49', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('257', 'ao-len', 'cate-pro', '0', '0', '0', '50', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('258', 'chan-vay', 'cate-pro', '0', '0', '0', '51', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('259', 'vay-yem-jeans-dep-b9291-22323', 'pro', '0', '0', '0', '0', '145', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('260', 'ao-lot', 'cate-pro', '0', '0', '0', '52', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('261', 'ao-lot-nguc', 'cate-pro', '0', '0', '0', '53', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('262', 'sexy-bralette-ren-ca-tinh', 'pro', '0', '0', '0', '0', '146', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('263', 'ao-la-co-choang-sexy', 'pro', '0', '0', '0', '0', '147', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('264', 'ao-nguc-t-shirt-anny', 'pro', '0', '0', '0', '0', '148', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('265', 'ao-lot-he-vui-tuoi', 'pro', '0', '0', '0', '0', '149', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('266', 'sexy-bralette-hong-ren-ca-tinh', 'pro', '0', '0', '0', '0', '150', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('267', 'ao-lot-nang-nguc-sexy', 'pro', '0', '0', '0', '0', '151', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('268', 'ao-phong-chu', 'pro', '0', '0', '0', '0', '152', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('269', 'ao-phong-den', 'pro', '0', '0', '0', '0', '153', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('270', 'ao-phong-chu-mau', 'pro', '0', '0', '0', '0', '154', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('271', 'ao-phong-tron', 'pro', '0', '0', '0', '0', '155', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('272', 'ao-phong-nu', 'cate-pro', '0', '0', '0', '54', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('273', 'ao-phong-cach-dieu', 'pro', '0', '0', '0', '0', '156', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('274', 'bo-bo-ngu-h28', 'pro', '0', '0', '0', '0', '157', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('275', 'chan-vay-cong-so', 'cate-pro', '0', '0', '0', '55', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('276', 'chan-vay-do-cuc-h01', 'pro', '0', '0', '0', '0', '158', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('277', 'chan-vay-den-h02', 'pro', '0', '0', '0', '0', '159', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('278', 'chan-vay-hong-dai-h03', 'pro', '0', '0', '0', '0', '160', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('279', 'chan-vay-ngan-xoe-h04', 'pro', '0', '0', '0', '0', '161', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('280', 'chan-vay-xoe-xep-li-h05', 'pro', '0', '0', '0', '0', '162', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('281', 'chan-vay-xoe-tron-h06', 'pro', '0', '0', '0', '0', '163', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('282', 'chan-vay-trang-h07', 'pro', '0', '0', '0', '0', '164', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('283', 'ao-long-cuu-h16', 'pro', '0', '0', '0', '0', '165', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('284', 'ao-long-cuu-h17', 'pro', '0', '0', '0', '0', '166', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('285', 'ao-long-vu-h18', 'pro', '0', '0', '0', '0', '167', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('286', 'ao-len-nu', 'cate-pro', '0', '0', '0', '56', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('294', 'vay-maxi-m01', 'pro', '0', '0', '0', '0', '174', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('295', 'vay-maxi-hoa-m02', 'pro', '0', '0', '0', '0', '175', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('296', 'vay-maxi-hoa-m03', 'pro', '0', '0', '0', '0', '176', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('290', 'do-ngu-h28', 'pro', '0', '0', '0', '0', '170', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('291', 'do-ngu-h29', 'pro', '0', '0', '0', '0', '171', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('297', 'vay-maxi-mau-m04', 'pro', '0', '0', '0', '0', '177', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('298', 'vay-maxi-vai-von-m05', 'pro', '0', '0', '0', '0', '178', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('299', 'vay-maxi-trang-m06', 'pro', '0', '0', '0', '0', '179', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('301', 'ao-len-l02', 'pro', '0', '0', '0', '0', '181', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('302', 'ao-len-l03', 'pro', '0', '0', '0', '0', '182', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('303', 'ao-len-l04', 'pro', '0', '0', '0', '0', '183', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('304', 'ao-len-l05', 'pro', '0', '0', '0', '0', '184', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('305', 'ao-len-l06', 'pro', '0', '0', '0', '0', '185', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('306', 'ao-len-l07', 'pro', '0', '0', '0', '0', '186', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('308', 'hoi-dap-ve-san-pham', 'page', '0', '0', '0', '0', '0', '36', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('309', 'giao-nhan-hang-hoa', 'page', '0', '0', '0', '0', '0', '37', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('313', 'cac-phuong-thuc-ban-han', 'page', '0', '0', '0', '0', '0', '41', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('311', 'phuong-thuc-van-chuyen', 'page', '0', '0', '0', '0', '0', '39', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('312', 'thoi-gian-dat-hang', 'page', '0', '0', '0', '0', '0', '40', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('314', 'nhung-lum-xum-ve-chuyen-tinh-cam-cua-ban-trai-voi-nhung-nguoi-khac-la-dieu-ma-nha-phuong-phai-nghe-nhieu-nhat-ke-tu-khi-hen-ho-voi-truong-giang', 'new', '0', '0', '16', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('315', 'ngoai-hanh-phuc-day-la-nhung-dieu-ma-nha-phuong-phai-chiu-dung-khi-yeu-truong-giang-phai-doi-mat', 'new', '0', '0', '17', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('316', 'tu-van-mien-phi-24-7', 'page', '0', '0', '0', '0', '0', '42', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('319', 'thai-do-cua-huong-giang-khi-thay-kim-ly-ho-ngoc-ha-tay-dan-tay-vo-cung-tinh-tu', 'new', '0', '0', '19', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);
INSERT INTO `alias` VALUES ('318', 'nhung-ngay-qua-khan-gia-khap-noi-dang-xon-xao-ve-su-viec-cua-truong-giang-va-nam-em', 'new', '0', '0', '18', '0', '0', '0', '0', '0', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for cashbook
-- ----------------------------
DROP TABLE IF EXISTS `cashbook`;
CREATE TABLE `cashbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `id_create` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `date_create` char(50) DEFAULT NULL,
  `hour_create` char(30) DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `time_create` int(11) DEFAULT NULL,
  `note` text,
  `type_id` int(11) DEFAULT NULL,
  `user_pay` int(11) DEFAULT NULL,
  `group_pay` char(50) DEFAULT NULL,
  `bill_code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cashbook
-- ----------------------------

-- ----------------------------
-- Table structure for cashtype
-- ----------------------------
DROP TABLE IF EXISTS `cashtype`;
CREATE TABLE `cashtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `note` text,
  `type` tinyint(1) DEFAULT NULL COMMENT '1:phiếu thu 0 phiếu chi',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cashtype
-- ----------------------------

-- ----------------------------
-- Table structure for code_sale
-- ----------------------------
DROP TABLE IF EXISTS `code_sale`;
CREATE TABLE `code_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of code_sale
-- ----------------------------
INSERT INTO `code_sale` VALUES ('10', 'Noel', 'ADCVX', '10', '1');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `comment` text CHARACTER SET utf8,
  `reply` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `review` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for comments_binhluan
-- ----------------------------
DROP TABLE IF EXISTS `comments_binhluan`;
CREATE TABLE `comments_binhluan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sanpham` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `giatri` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `date` date NOT NULL,
  `flg` int(1) NOT NULL DEFAULT '0' COMMENT '0: moi binh luan; 1: xac nhan de hien thi',
  `reply` int(11) DEFAULT NULL,
  `review` tinyint(1) DEFAULT '0',
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of comments_binhluan
-- ----------------------------
INSERT INTO `comments_binhluan` VALUES ('1', '5', 'nội dung đánh giá sản phẩm này rất tốt', '5', '0', '0', '1505698798', '2017-09-18', '0', '0', '1', 'trần mạnh', 'dangtranmanh051187@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('2', '5', 'nội dung bình luận', '0', '0', '0', '1505698841', '2017-09-18', '0', '0', '1', 'trần mạnh', 'dangtranmanh051187@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('3', '5', 'noi dung binh luận đánh giá nhận xét', '0', '0', '0', '1505699713', '2017-09-18', '0', '0', '0', 'trần mạnh', 'dangtranmanh051187@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('4', '5', 'nội dung bình luận tiếp theo', '4', '0', '0', '1505699941', '2017-09-18', '0', '0', '1', 'trần mạnh', 'dangtranmanh051187@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('5', '5', 'bình luận của vũ', '0', '0', '0', '1505700184', '2017-09-18', '0', '0', '1', 'trần long vũ', 'dangtranmanh051187@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('6', '5', 'bình luận của vũ', '0', '0', '0', '1505700223', '2017-09-18', '0', '0', '1', 'trần long vũ', 'dangtranmanh051187@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('7', '5', 'binh luận mới', '2', '0', '0', '1505700317', '2017-09-18', '0', '0', '1', 'tiến đạt', 'nguyentiendat@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('8', '5', 'noi dung binh luận', '1', '0', '0', '1505702973', '2017-09-18', '0', '0', '1', 'công sáng', 'congsang@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('9', '5', 'bình luận tiếp theo', '5', '0', '0', '1505703111', '2017-09-18', '0', '0', '1', 'công sáng', 'congsang@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('10', '5', 'noi trung tra loi binh luan', '4', '0', '0', '1505721191', '0000-00-00', '0', '7', '1', 'cong sangs', 'congsang@gmail.com', '1');
INSERT INTO `comments_binhluan` VALUES ('11', '4', 'Tốt', '5', '0', '0', '1505981714', '2017-09-21', '0', '0', '1', 'Vân', 'buivananh.th@gmail.com', '1');

-- ----------------------------
-- Table structure for config_banner
-- ----------------------------
DROP TABLE IF EXISTS `config_banner`;
CREATE TABLE `config_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `field` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `active` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of config_banner
-- ----------------------------
INSERT INTO `config_banner` VALUES ('1', null, 'banner trang chủ', 'banner', '1');
INSERT INTO `config_banner` VALUES ('2', null, 'slide', 'slide', '1');
INSERT INTO `config_banner` VALUES ('3', null, 'banner trái', 'left', '0');
INSERT INTO `config_banner` VALUES ('4', null, 'Banner phải', 'right', '0');
INSERT INTO `config_banner` VALUES ('5', null, 'banner top', 'top', '0');
INSERT INTO `config_banner` VALUES ('6', null, 'banner bottom', 'bottom', '0');
INSERT INTO `config_banner` VALUES ('7', null, 'đối tác', 'partners', '1');

-- ----------------------------
-- Table structure for config_checkpro
-- ----------------------------
DROP TABLE IF EXISTS `config_checkpro`;
CREATE TABLE `config_checkpro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `field` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `active` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of config_checkpro
-- ----------------------------
INSERT INTO `config_checkpro` VALUES ('1', 'product', 'Gợi ý cho bạn', 'hot', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('2', 'product', 'Trang chủ', 'home', '008d4c', '1');
INSERT INTO `config_checkpro` VALUES ('3', 'product', 'sp khuyến mại', 'coupon', 'f39c12', '1');
INSERT INTO `config_checkpro` VALUES ('4', 'product', 'sản phẩm nổi bật', 'focus', 'd352d4', '1');
INSERT INTO `config_checkpro` VALUES ('5', 'product_category', 'Trang chủ', 'home', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('6', 'product_category', 'Danh mục mới', 'hot', '008d4c', '0');
INSERT INTO `config_checkpro` VALUES ('7', 'product_category', 'Nổi bật', 'focus', 'c3c3c3', '0');
INSERT INTO `config_checkpro` VALUES ('8', 'product_category', 'Đặc biệt', 'coupon', 'd352d4', '0');
INSERT INTO `config_checkpro` VALUES ('9', 'news', 'Trang chủ', 'home', 'd73925', '0');
INSERT INTO `config_checkpro` VALUES ('10', 'news', 'Tin nổi bật', 'focus', '008d4c', '0');
INSERT INTO `config_checkpro` VALUES ('11', 'news', 'Tin mới', 'hot', 'c3c3c3', '0');
INSERT INTO `config_checkpro` VALUES ('12', 'news_category', 'Trang chủ', 'home', 'd73925', '0');
INSERT INTO `config_checkpro` VALUES ('13', 'news_category', 'Danh mục hót', 'hot', '008d4c', '0');
INSERT INTO `config_checkpro` VALUES ('14', 'news_category', 'Nổi bật', 'focus', 'c3c3c3', '0');
INSERT INTO `config_checkpro` VALUES ('15', 'news_category', 'Danh mục bên trái', 'coupon', '0098da', '0');
INSERT INTO `config_checkpro` VALUES ('16', 'media', 'Trang chủ', 'home', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('17', 'media', 'nổi bật', 'focus', '008d4c', '1');
INSERT INTO `config_checkpro` VALUES ('18', 'media', 'Đặc biệt', 'hot', 'c3c3c3', '1');
INSERT INTO `config_checkpro` VALUES ('19', 'media_category', 'Trang chủ', 'home', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('20', 'media_category', 'Mới', 'hot', '008d4c', '1');
INSERT INTO `config_checkpro` VALUES ('21', 'media_category', 'Nổi bật', 'focus', 'c3c3c3', '1');
INSERT INTO `config_checkpro` VALUES ('22', 'media_category', 'Cột trái', 'coupon', 'd352d4', '1');
INSERT INTO `config_checkpro` VALUES ('23', 'video', 'Trang chủ', 'home', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('24', 'video', 'nổi bật', 'focus', '008d4c', '1');
INSERT INTO `config_checkpro` VALUES ('25', 'video', 'Đặc biệt', 'hot', 'c3c3c3', '1');
INSERT INTO `config_checkpro` VALUES ('26', 'video_category', 'Trang chủ', 'home', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('27', 'video_category', 'Mới', 'hot', '008d4c', '1');
INSERT INTO `config_checkpro` VALUES ('28', 'video_category', 'Nổi bật', 'focus', 'c3c3c3', '1');
INSERT INTO `config_checkpro` VALUES ('29', 'staticpage', 'Trang chủ', 'home', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('30', 'staticpage', 'Liên hệ', 'focus', '008d4c', '0');
INSERT INTO `config_checkpro` VALUES ('31', 'staticpage', 'Đặc biệt', 'hot', 'c3c3c3', '0');
INSERT INTO `config_checkpro` VALUES ('32', 'raovat', 'Trang chủ', 'home', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('33', 'raovat', 'nổi bật', 'focus', '008d4c', '1');
INSERT INTO `config_checkpro` VALUES ('34', 'raovat', 'Đặc biệt', 'hot', 'c3c3c3', '1');
INSERT INTO `config_checkpro` VALUES ('35', 'raovat_category', 'Trang chủ', 'home', 'd73925', '1');
INSERT INTO `config_checkpro` VALUES ('36', 'raovat_category', 'Mới', 'hot', '008d4c', '1');
INSERT INTO `config_checkpro` VALUES ('37', 'raovat_category', 'Nổi bật', 'focus', 'c3c3c3', '1');

-- ----------------------------
-- Table structure for config_menu
-- ----------------------------
DROP TABLE IF EXISTS `config_menu`;
CREATE TABLE `config_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `field` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `active` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of config_menu
-- ----------------------------
INSERT INTO `config_menu` VALUES ('2', 'top', 'menu top', null, '1');
INSERT INTO `config_menu` VALUES ('3', 'left', 'menu left', null, '0');
INSERT INTO `config_menu` VALUES ('4', 'right', 'menu right', null, '0');
INSERT INTO `config_menu` VALUES ('5', 'bottom', 'menu bottom', null, '1');
INSERT INTO `config_menu` VALUES ('6', 'tag', 'menu tag', null, '0');
INSERT INTO `config_menu` VALUES ('7', 'bottom_2', 'menu bottom 2', null, '0');
INSERT INTO `config_menu` VALUES ('8', 'bottom_3', 'menu bottom 3', null, '0');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `comment` text CHARACTER SET utf8,
  `mark` tinyint(1) DEFAULT '0',
  `show` tinyint(1) DEFAULT '0',
  `time` int(11) DEFAULT NULL,
  `cat_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('13', 'Vân', '0982255552', 'buivananh.th@gmail.com', 'sâsasaas', null, null, 'sxssxxs', '0', '0', '1505980957', null);
INSERT INTO `contact` VALUES ('14', 'Vân', '0989339814', 'buivananh.th@gmail.com', ' Số 7, ngách 71 Ngõ 120 Phường Vĩnh Tuy, Quận Hai Bà Trưng, TP Hà Nội', null, null, 'sdsdsd', '0', '0', '1512033926', null);
INSERT INTO `contact` VALUES ('15', 'Hồ Công Trứ', '1669222669', 'hocongtru95@gmail.com', null, null, null, 'binh luan', '0', '1', '1522403903', null);
INSERT INTO `contact` VALUES ('16', 'phạm hương', '0943434389', 'phamhoa@gmail.com', null, null, null, 'thông tin sản phẩm', '0', '1', '1522810591', null);

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `birthday` int(11) unsigned DEFAULT NULL,
  `gender` tinyint(3) unsigned DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `place` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `province` int(11) unsigned DEFAULT NULL,
  `district` int(11) unsigned DEFAULT NULL,
  `ward` int(10) unsigned DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tax_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `note` text CHARACTER SET utf8,
  `user_id` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `date` char(30) COLLATE utf8_bin DEFAULT NULL,
  `time` char(20) COLLATE utf8_bin DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `wallet` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('30', 'Thẩm Hải Văn', 'KH30', '0976834543', 'qts@info.mail', '1', '1', '', null, null, null, null, '', '', '', null, null, null, '1523519622', null, null);
INSERT INTO `customer` VALUES ('31', 'Lưu Văn Bị', 'KH31', '09657754654', 'lubi@gmail.com', '12', '1', '', null, null, null, null, '', '', '', null, null, null, '1523519669', null, null);
INSERT INTO `customer` VALUES ('33', 'Khách lẻ', 'KHACHLE', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for customer_debt
-- ----------------------------
DROP TABLE IF EXISTS `customer_debt`;
CREATE TABLE `customer_debt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `id_create` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `nkd` float(22,0) DEFAULT '0',
  `ghino` float(22,0) DEFAULT '0',
  `ghico` float(22,0) DEFAULT '0',
  `nkc` float(22,0) DEFAULT '0',
  `type` varchar(255) DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `time_insert` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of customer_debt
-- ----------------------------
INSERT INTO `customer_debt` VALUES ('25', '33', '2', 'HD208', '0', '450000', '0', '450000', 'Bán hàng', '1523552400', '1523603853', '0');
INSERT INTO `customer_debt` VALUES ('26', '33', '2', 'HD209', '450000', '400000', '0', '850000', 'Bán hàng', '1523552400', '1523603975', '0');

-- ----------------------------
-- Table structure for debt_supplier
-- ----------------------------
DROP TABLE IF EXISTS `debt_supplier`;
CREATE TABLE `debt_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nkd` float(22,0) DEFAULT '0',
  `ghino` float(22,0) DEFAULT NULL,
  `ghico` float(22,0) DEFAULT NULL,
  `nkc` float(22,0) DEFAULT NULL,
  `id_ncc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of debt_supplier
-- ----------------------------

-- ----------------------------
-- Table structure for district
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `pre` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `provinceid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=698 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of district
-- ----------------------------
INSERT INTO `district` VALUES ('106', 'Bến Lức', 'Huyện', '8');
INSERT INTO `district` VALUES ('121', 'Bắc Trà My', 'Huyện', '9');
INSERT INTO `district` VALUES ('139', 'Bà Rịa', 'Thị xã', '10');
INSERT INTO `district` VALUES ('147', 'Buôn Đôn', 'Huyện', '11');
INSERT INTO `district` VALUES ('162', ' Thới Lai', 'Huyện', '12');
INSERT INTO `district` VALUES ('171', 'Bắc Bình', 'Huyện', '13');
INSERT INTO `district` VALUES ('181', 'Bảo Lâm', 'Huyện', '14');
INSERT INTO `district` VALUES ('193', 'A Lưới', 'Huyện', '15');
INSERT INTO `district` VALUES ('202', 'An Biên', 'Huyện', '16');
INSERT INTO `district` VALUES ('217', 'Bắc Ninh', 'Thành phố', '17');
INSERT INTO `district` VALUES ('225', 'Ba Chẽ', 'Huyện', '18');
INSERT INTO `district` VALUES ('239', 'Bá Thước', 'Huyện', '19');
INSERT INTO `district` VALUES ('266', 'Anh Sơn', 'Huyện', '20');
INSERT INTO `district` VALUES ('287', 'Bình Giang', 'Huyện', '21');
INSERT INTO `district` VALUES ('299', 'An Khê', 'Thị xã', '22');
INSERT INTO `district` VALUES ('316', 'Bình Long', 'Thị xã', '23');
INSERT INTO `district` VALUES ('327', 'Ân Thi', 'Huyện', '24');
INSERT INTO `district` VALUES ('337', 'An Lão', 'Huyện', '25');
INSERT INTO `district` VALUES ('348', 'Cái Bè', 'Huyện', '26');
INSERT INTO `district` VALUES ('359', 'Đông Hưng', 'Huyện', '27');
INSERT INTO `district` VALUES ('367', 'Bắc Giang', 'Thành phố', '28');
INSERT INTO `district` VALUES ('377', 'Cao Phong', 'Huyện', '29');
INSERT INTO `district` VALUES ('388', 'An Phú', 'Huyện', '30');
INSERT INTO `district` VALUES ('399', 'Bình Xuyên', 'Huyện', '31');
INSERT INTO `district` VALUES ('408', 'Bến Cầu', 'Huyện', '32');
INSERT INTO `district` VALUES ('417', 'Đại Từ', 'Huyện', '33');
INSERT INTO `district` VALUES ('426', 'Bắc Hà', 'Huyện', '34');
INSERT INTO `district` VALUES ('435', 'Giao Thủy', 'Huyện', '35');
INSERT INTO `district` VALUES ('445', 'Ba Tơ', 'Huyện', '36');
INSERT INTO `district` VALUES ('459', 'Ba Tri', 'Huyện', '37');
INSERT INTO `district` VALUES ('468', 'Cư Jút', 'Huyện', '38');
INSERT INTO `district` VALUES ('476', 'Cà Mau', 'Thành phố', '39');
INSERT INTO `district` VALUES ('485', 'Bình Minh', 'Huyện', '40');
INSERT INTO `district` VALUES ('493', 'Gia Viễn', 'Huyện', '41');
INSERT INTO `district` VALUES ('501', 'Cẩm Khê', 'Huyện', '42');
INSERT INTO `district` VALUES ('514', 'Bác Ái', 'Huyện', '43');
INSERT INTO `district` VALUES ('521', 'Đông Hòa', 'Huyện', '44');
INSERT INTO `district` VALUES ('530', 'Bình Lục', 'Huyện', '45');
INSERT INTO `district` VALUES ('536', 'Cẩm Xuyên', 'Huyện', '46');
INSERT INTO `district` VALUES ('548', 'Cao Lãnh', 'Thành phố', '47');
INSERT INTO `district` VALUES ('560', 'Châu Thành', 'Huyện', '48');
INSERT INTO `district` VALUES ('571', 'Đăk Glei', 'Huyện', '49');
INSERT INTO `district` VALUES ('581', 'Ba Đồn', 'Thị xã', '50');
INSERT INTO `district` VALUES ('589', 'Cam Lộ', 'Huyện', '51');
INSERT INTO `district` VALUES ('599', 'Càng Long', 'Huyện', '52');
INSERT INTO `district` VALUES ('607', 'Châu Thành', 'Huyện', '53');
INSERT INTO `district` VALUES ('614', 'Bắc Yên', 'Huyện', '54');
INSERT INTO `district` VALUES ('626', 'Bạc Liêu', 'Thành phố', '55');
INSERT INTO `district` VALUES ('633', 'Lục Yên', 'Huyện', '56');
INSERT INTO `district` VALUES ('642', 'Chiêm Hóa', 'Huyện', '57');
INSERT INTO `district` VALUES ('649', 'Điện Biên', 'Huyện', '58');
INSERT INTO `district` VALUES ('659', 'Lai Châu', 'Thị xã', '59');
INSERT INTO `district` VALUES ('678', 'Bắc Mê', 'Huyện', '61');
INSERT INTO `district` VALUES ('689', 'Ba Bể', 'Huyện', '62');
INSERT INTO `district` VALUES ('697', 'Bảo Lạc', 'Huyện', '63');

-- ----------------------------
-- Table structure for document
-- ----------------------------
DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `description` text CHARACTER SET utf8,
  `sort` int(3) DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT '1',
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of document
-- ----------------------------
INSERT INTO `document` VALUES ('1', 'Hướng dẫn tổng quan về quản trị website', '0', '<p><a href=\"http://giaodiendep.vn/huongdan/\">Xem video hướng dẫn</a></p>\r\n', '1', 'vi', '1');

-- ----------------------------
-- Table structure for emails
-- ----------------------------
DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of emails
-- ----------------------------
INSERT INTO `emails` VALUES ('15', 'trantrung@gmail.com', '1523076208', null, null);
INSERT INTO `emails` VALUES ('11', 'vinarise.vn@gmail.com', '1433996361', null, null);
INSERT INTO `emails` VALUES ('12', 'daibkz@gmail.com', '1470928353', null, null);
INSERT INTO `emails` VALUES ('13', 'dangtranmanh051187@gmail.com', '1506309969', null, null);
INSERT INTO `emails` VALUES ('14', 'buivananh.th@gmail.com', '1506331541', null, null);

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `target` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `cate` int(4) DEFAULT '0',
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=286 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('200', null, null, null, '_self', null, null, null, null, '0', null, null);
INSERT INTO `images` VALUES ('216', null, null, 'Video hướng dẫn lắp đặt camera 2', '_self', '12', 'upload/img/media/9f62009350cb11a54f10ffd7c56e1bca.png', '1', '2', '0', null, 'https://www.youtube.com/embed/QzqthoS3Xkw');
INSERT INTO `images` VALUES ('217', null, null, 'HƯỚNG DẪN LẮP ĐẶT HỆ THỐNG CAMERA QUAN SÁT', '_self', '12', 'upload/img/media/14fca64f4ab55bddda0d89209d9d8c80.png', '1', '3', '0', null, 'https://www.youtube.com/embed/JdrNRXs8KqI');
INSERT INTO `images` VALUES ('218', null, null, 'Hướng dẫn cấu hình Camera xem qua mạng 100% thành công', '_self', '12', 'upload/img/media/9f62009350cb11a54f10ffd7c56e1bca1.png', '1', '4', '0', null, 'https://www.youtube.com/embed/Q27P_jphAXU');
INSERT INTO `images` VALUES ('219', null, null, 'Video Clip Hướng dẫn sử dụng Camera IP Wifi không dây thông minh Webvision 6203', '_self', '12', 'upload/img/media/9f62009350cb11a54f10ffd7c56e1bca2.png', '1', '5', '0', null, 'https://www.youtube.com/embed/isA3QHA4wOM');
INSERT INTO `images` VALUES ('274', 'slide', '', 'banner1', '_self', null, 'upload/img/banner/baner.png', null, '0', '0', 'vi', '');
INSERT INTO `images` VALUES ('275', 'banner', '', 'banner2', '_self', null, 'upload/img/banner/baner-1.png', null, '1', '0', 'vi', '');
INSERT INTO `images` VALUES ('285', 'banner', '', 'quảng cáo trang chủ 01', '_self', null, 'upload/img/banner/banner-right-1.jpg', null, '2', '0', 'vi', '');

-- ----------------------------
-- Table structure for inuser
-- ----------------------------
DROP TABLE IF EXISTS `inuser`;
CREATE TABLE `inuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `hot` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `alias` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT '1',
  `tag` text COLLATE utf8_unicode_ci,
  `time` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `home` int(11) DEFAULT NULL,
  `focus` int(11) DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of inuser
-- ----------------------------
INSERT INTO `inuser` VALUES ('4', 'Rực Rỡ Mùa Hoa Tây Bắc', 'Tết Nguyên Đán 2015 là thời khắc quan trọng nhất trong năm, là khi mỗi gia đình Việt Nam có thời gian được trở về quây quần bên nhau và tưng bừng du xuân khắp mọi miền đất nước. Trong không khí xuân nồng ấm ấy, Vietravel hân hạnh gửi tới Quý khách hàng ngàn đường tour Việt Nam để gia đình bạn thỏa sức tận hưởng những ngày lễ vui tươi, hạnh phúc, đón chào năm mới An khang Thịnh Vượng. \n', '1', 'upload/img/ava1_hoanhai1.jpg', '<div>&nbsp;</div>\n\n<div>\n<p style=\"text-align:justify\"><strong>Ng&agrave;y 1 : TP.HCM - NỘI B&Agrave;I (H&Agrave; NỘI) &ndash; ĐỀN H&Ugrave;NG - NGHĨA LỘ Số bữa ăn: 3 bữa&nbsp;</strong></p>\n\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://travel.com.vn/Images/tour/tfd_141103_mien%20bac%20-%20den%20hung.jpg\" style=\"border:0px; box-sizing:border-box; height:458px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">Qu&yacute; kh&aacute;ch tập trung tại cột số 04 ga đi Trong Nước - S&acirc;n bay T&acirc;n Sơn Nhất để hướng dẫn l&agrave;m thủ tục cho Qu&yacute; kh&aacute;ch đ&aacute;p chuyến bay đi H&agrave; Nội. Xe Vietravel đ&oacute;n đo&agrave;n tại s&acirc;n bay Nội B&agrave;i, khởi h&agrave;nh đi Y&ecirc;n B&aacute;i. Tr&ecirc;n đường đi Qu&yacute; kh&aacute;ch gh&eacute; Ph&uacute; Thọ viếng Đền H&ugrave;ng, đến nơi, Qu&yacute; kh&aacute;ch l&agrave;m lễ d&acirc;ng hương đất tổ, tham quan đền Thượng, đền Trung, đền Hạ, Giếng Ngọc, Lăng vua H&ugrave;ng, tự do chụp ảnh mua sắm qu&agrave; lưu niệm. Đo&agrave;n tiếp tục khởi h&agrave;nh đi Nghĩa Lộ, nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi. Buổi tối, Qu&yacute; kh&aacute;ch thưởng thức chương tr&igrave;nh biểu diễn m&uacute;a X&ograve;e, giao lưu v&agrave; t&igrave;m hiểu n&eacute;t văn h&oacute;a đặc sắc của d&acirc;n tộc Th&aacute;i. Nghỉ đ&ecirc;m tại Nghĩa Lộ.</p>\n\n<p style=\"text-align:justify\"><strong>Ng&agrave;y 2 : NGHĨA LỘ - M&Ugrave; CANG CHẢI - SAPA (Số bữa ăn: 3 bữa)</strong></p>\n\n<p style=\"text-align:center\"><strong><img alt=\"\" src=\"https://travel.com.vn/Images/tour/tfd_141103_sapa%20-%20muong%20hoa%202.jpg\" style=\"border:0px; box-sizing:border-box; height:408px; vertical-align:middle; width:650px\" /></strong></p>\n\n<p style=\"text-align:justify\">Trả ph&ograve;ng kh&aacute;ch sạn, đo&agrave;n khởi h&agrave;nh đi M&ugrave; Cang Chải, ngang qua T&uacute; Lệ, Qu&yacute; kh&aacute;ch sẽ ngửi được m&ugrave;i hương thoang thoảng theo gi&oacute; bảng lảng tr&ecirc;n m&aacute;i nh&agrave; của &ldquo;cơm mới&rdquo;, nơi đ&acirc;y nổi tiếng với x&ocirc;i nếp, cốm kh&ocirc;. Đến Đ&egrave;o Khau Phạ Qu&yacute; kh&aacute;ch dừng chụp ảnh v&agrave; ngắm nh&igrave;n Bản L&igrave;m M&ocirc;ng xinh đẹp tọa lạc dưới ch&acirc;n đ&egrave;o. Đ&acirc;y l&agrave; Bản của d&acirc;n tộc M&ocirc;ng v&agrave; l&agrave; nơi c&oacute; ruộng l&uacute;a đẹp nhất M&ugrave; Cang Chải. Qua đ&egrave;o Khau Phạ v&agrave;o địa phận M&ugrave; Cang Chải, Qu&yacute; kh&aacute;ch sẽ bị m&ecirc; hoặc bởi vẻ đẹp h&uacute;t hồn của cung đường ruộng bậc thang (Nổi tiếng tại 3 x&atilde;: La P&aacute;n Tẩn, Chế Cu Nha v&agrave; Zế Xu Ph&igrave;nh). Đo&agrave;n chi&ecirc;m ngưỡng những thung lũng rộng h&uacute;t tầm mắt, c&aacute;c thửa ruộng tầng tầng lớp lớp lượn s&oacute;ng theo sườn n&uacute;i, ngọn n&uacute;i n&agrave;y nối tiếp ngọn n&uacute;i kh&aacute;c. Qu&yacute; kh&aacute;ch c&oacute; thể tham quan v&agrave; thưởng ngoạn c&aacute;c giai đoạn của m&ugrave;a l&uacute;a: m&ugrave;a nước đổ &oacute;ng &aacute;nh tr&ecirc;n c&aacute;c triền n&uacute;i (th&aacute;ng 2-3), m&ugrave;a cấy l&uacute;a (th&aacute;ng 5), m&ugrave;a l&uacute;a non (th&aacute;ng 6-7) v&agrave; đẹp nhất l&agrave;m m&ugrave;a l&uacute;a ch&iacute;n hay c&ograve;n lại l&agrave; m&ugrave;a v&agrave;ng (th&aacute;ng 9-10). Cũng ch&iacute;nh bởi vẻ đẹp m&ecirc; l&ograve;ng người v&agrave;o m&ugrave;a l&uacute;a ch&iacute;n m&agrave; Ruộng Bậc Thang ở ba x&atilde; n&agrave;y đ&atilde; được xếp hạng Di t&iacute;ch Quốc Gia năm 2007. Đến thị trấn M&ugrave; Cang Chải, Qu&yacute; kh&aacute;ch ăn trưa, nghỉ ngơi. Chiều đo&agrave;n khởi h&agrave;nh đi Sa Pa, tr&ecirc;n đường đi Qu&yacute; kh&aacute;ch dừng ch&acirc;n ngắm to&agrave;n cảnh đồi ch&egrave; T&acirc;n Uy&ecirc;n thơ mộng v&agrave; tiếp tục sẽ được chi&ecirc;m ngưỡng phong cảnh n&uacute;i rừng T&acirc;y Bắc h&ugrave;ng vĩ tr&ecirc;n Đ&egrave;o &Ocirc; Quy Hồ - Ranh giới giữa 2 tỉnh L&agrave;o Cai v&agrave; Lai Ch&acirc;u uốn lượn quanh d&atilde;y Ho&agrave;ng Li&ecirc;n c&ograve;n gọi l&agrave; khu vực Cổng Trời. Đến Sa Pa, nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi. Buổi tối, Qu&yacute; kh&aacute;ch tự do tham quan phố n&uacute;i v&agrave; thưởng thức những m&oacute;n ăn đặc sản tại nơi đ&acirc;y. Nghỉ đ&ecirc;m tại Sa Pa</p>\n\n<p style=\"text-align:justify\"><strong>Ng&agrave;y 3 : SAPA - LAI CH&Acirc;U (Số bữa ăn: 3 bữa)</strong></p>\n\n<p style=\"text-align:center\"><strong><img alt=\"\" src=\"https://travel.com.vn/Images/tour/tfd_141103_sapa%20trong%20suong%201.jpg\" style=\"border:0px; box-sizing:border-box; height:436px; vertical-align:middle; width:650px\" /></strong></p>\n\n<p style=\"text-align:justify\">Qu&yacute; kh&aacute;ch tham quan v&agrave; chinh phục N&uacute;i H&agrave;m Rồng, thăm Vườn Lan khoe sắc, Vườn Hoa Trung T&acirc;m, ngắm N&uacute;i Phanxipăng h&ugrave;ng vĩ, Cổng Trời, Đầu Rồng Thạch L&acirc;m, S&acirc;n M&acirc;y. Đo&agrave;n tự do ngắm cảnh v&agrave; chụp ảnh thị trấn Sapa trong sương. Trả ph&ograve;ng kh&aacute;ch sạn, ăn trưa. Chiều Qu&yacute; kh&aacute;ch tham quan Th&aacute;c Bạc - D&ograve;ng nước trắng x&oacute;a chảy từ độ cao tr&ecirc;n 200m v&agrave;o d&ograve;ng suối dưới thung lũng &Ocirc; Quy Hồ, tạo n&ecirc;n &acirc;m thanh n&uacute;i rừng đầy ấn tượng, tiếp tục tham quan Lao Chải, Tả Van hoặc Tả Ph&igrave;n (t&ugrave;y điều kiện thực tế). Về đến Lai Ch&acirc;u, Qu&yacute; kh&aacute;ch nhận ph&ograve;ng kh&aacute;ch sạn. Nghỉ đ&ecirc;m tại Lai Ch&acirc;u.</p>\n\n<p style=\"text-align:justify\"><strong>Ng&agrave;y 4 : LAI CH&Acirc;U - PHONG THỔ - MƯỜNG LAY - ĐIỆN BI&Ecirc;N (Số bữa ăn: 3 bữa)</strong></p>\n\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://travel.com.vn/Images/tour/tfd_140929_du-lich-tay-bac.jpg\" style=\"border:0px; box-sizing:border-box; height:432px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">Đo&agrave;n trả ph&ograve;ng ăn s&aacute;ng, khởi h&agrave;nh đi Điện Bi&ecirc;n, tr&ecirc;n đường ngắm cảnh rừng n&uacute;i T&acirc;y Bắc dọc theo d&ograve;ng s&ocirc;ng Nậm Na v&agrave; v&ugrave;ng ngập nước do đập nh&agrave; m&aacute;y Thủy điện Sơn La d&acirc;ng l&ecirc;n tại ng&atilde; ba s&ocirc;ng: s&ocirc;ng Đ&agrave;, s&ocirc;ng Nậm Na v&agrave; s&ocirc;ng Nậm Rốm. Đến Mường L&acirc;y ăn trưa. Đo&agrave;n tiếp tục khởi h&agrave;nh đến Điện Bi&ecirc;n, Qu&yacute; kh&aacute;ch tham quan Bảo t&agrave;ng Điện Bi&ecirc;n Phủ - Được x&acirc;y dựng v&agrave;o năm 1984 nh&acirc;n dịp kỷ niệm 30 năm chiến thắng lịch sử Điện Bi&ecirc;n Phủ, viếng Nghĩa trang liệt sĩ đồi A1, thăm Đồi A1, Hầm sở chỉ huy qu&acirc;n đội Ph&aacute;p - Tướng Đờ C&aacute;t (De Castries). Nghỉ đ&ecirc;m tại Điện Bi&ecirc;n. Nhận ph&ograve;ng kh&aacute;ch sạn, ăn tối v&agrave; nghỉ đ&ecirc;m tại Điện Bi&ecirc;n</p>\n\n<p style=\"text-align:justify\"><strong>Ng&agrave;y 5 : ĐIỆN BI&Ecirc;N - SƠN LA - MỘC CH&Acirc;U (Số bữa ăn: 3 bữa)</strong></p>\n\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://travel.com.vn/Images/tour/tfd_140905_Doi%20che%20Moc%20Chau.jpg\" style=\"border:0px; box-sizing:border-box; height:424px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">Trả ph&ograve;ng kh&aacute;ch sạn, đo&agrave;n khởi h&agrave;nh về Sơn La. Tr&ecirc;n đường đi, Qu&yacute; kh&aacute;ch sẽ được chi&ecirc;m ngưỡng phong cảnh n&uacute;i rừng T&acirc;y Bắc h&ugrave;ng vĩ tr&ecirc;n đỉnh Đ&egrave;o Pha Đin - Một trong &quot;tứ đại đ&egrave;o&quot; v&ugrave;ng T&acirc;y Bắc v&agrave; được xếp c&ugrave;ng nh&oacute;m 6 con đ&egrave;o g&acirc;y ấn tượng nhất Việt Nam. Đến Sơn La, Qu&yacute; kh&aacute;ch ăn trưa. Sau đ&oacute;, Qu&yacute; kh&aacute;ch khởi h&agrave;nh về Mộc Ch&acirc;u. Đo&agrave;n khởi h&agrave;nh tham quan Th&aacute;c Dải Yếm - C&ograve;n c&oacute; t&ecirc;n gọi l&agrave; Th&aacute;c N&agrave;ng, nhằm v&iacute; vẻ đẹp mềm mại, h&igrave;nh ảnh quyến rũ của th&aacute;c nước như xu&acirc;n sắc của người con g&aacute;i tuổi trăng tr&ograve;n. Sau đ&oacute; tham quan Đồi Ch&egrave; Mộc Ch&acirc;u - Đứng tr&ecirc;n đồi ch&egrave; du kh&aacute;ch sẽ cảm nhận được l&agrave;n kh&ocirc;ng kh&iacute; m&aacute;t lạnh trong l&agrave;nh, tận mắt thấy những l&agrave;n sương bồng bềnh tr&ocirc;i, những đường ch&egrave; chạy v&ograve;ng quanh đồi được sắp đặt th&agrave;nh h&agrave;ng như những thửa ruộng bậc thang xanh ngắt cứ trải d&agrave;i bất tận. Qu&yacute; kh&aacute;ch dừng mua sắm đặc sản nổi tiếng được chế biến từ sữa b&ograve; tươi nổi tiếng của Mộc Ch&acirc;u về l&agrave;m qu&agrave;. Đo&agrave;n về kh&aacute;ch sạn nhận ph&ograve;ng, nghỉ ngơi. Nghỉ đ&ecirc;m tại Mộc Ch&acirc;u.</p>\n\n<p style=\"text-align:justify\"><strong>Ng&agrave;y 6 : MỘC CH&Acirc;U - MAI CH&Acirc;U - H&Ograve;A B&Igrave;NH - S&Acirc;N BAY NỘI B&Agrave;I (H&Agrave; NỘI) (Số bữa ăn: 2 bữa (s&aacute;ng, trưa))</strong></p>\n\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://travel.com.vn/Images/tour/tfd_141103_moc%20chau%20-%20hoa%20cai.jpg\" style=\"border:0px; box-sizing:border-box; height:346px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">Ăn s&aacute;ng tại kh&aacute;ch sạn, trả ph&ograve;ng. Đo&agrave;n khởi h&agrave;nh đi Mai Ch&acirc;u - H&ograve;a B&igrave;nh, tham quan Bản L&aacute;c Mai Ch&acirc;u - T&igrave;m hiểu nh&agrave; s&agrave;n, phong tục tập qu&aacute;n, c&aacute;ch kinh doanh du lịch loại h&igrave;nh home stay của b&agrave; con người Th&aacute;i nơi đ&acirc;y. Đo&agrave;n khởi h&agrave;nh về H&ograve;a B&igrave;nh ăn trưa. Đo&agrave;n khởi h&agrave;nh về H&ograve;a B&igrave;nh ăn trưa. Sau đ&oacute;, khởi h&agrave;nh về H&agrave; Nội, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay Nội B&agrave;i đ&aacute;p chuyến bay về Tp.HCM. Chia tay Qu&yacute; kh&aacute;ch v&agrave; kết th&uacute;c chương tr&igrave;nh du lịch tại s&acirc;n bay T&acirc;n Sơn Nhất</p>\n</div>\n', 'ruc-ro-mua-hoa-tay-bac', '0', '0', '1446786194', '22', '0', '0', '', '', '');
INSERT INTO `inuser` VALUES ('5', 'Giấc mộng hoa phương Bắc', 'Đất trời đã vào xuân, non cao miền Bắc bừng sáng trong vẻ đẹp mê đắm của rừng hoa thắm sắc ẩn hiện trong sương khói vấn vương. Những bước chân phiêu du trên núi ngàn cũng rộn rã hơn, chan hòa cùng nét tươi mới giữa đất trời nở hoa. Tour Tết, Trong nước', '1', 'upload/img/mua-hoa-xuan-tay-bac_1.jpg', '<div>&nbsp;</div>\n\n<div>\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://www.vietravel.com.vn/Images/inuserPicture/mua-hoa-xuan-tay-bac_1.jpg\" style=\"border:0px; box-sizing:border-box; height:441px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">nhiều lần lỡ hẹn, t&ocirc;i cũng đặt ch&acirc;n đến miền rẻo cao phương Bắc với thật nhiều h&aacute;o hức. Qu&atilde;ng đường đi qua&nbsp; Sapa, Điện Bi&ecirc;n, Sơn La, Cao Bằng, Lạng Sơn&hellip; dường như ngắn lại bởi ai cũng say sưa ngắm những cung đường bạt ng&agrave;n hoa đ&agrave;o, hoa mận, hoa mơ. Hoa nở tr&agrave;n tr&ecirc;n triền đồi, lấp l&oacute; ven đường, hồn nhi&ecirc;n thả bức r&egrave;m trước s&acirc;n nh&agrave;&hellip; đẹp đến nỗi kh&ocirc;ng một m&aacute;y ảnh &ldquo;khủng&rdquo; n&agrave;o c&oacute; thể ghi lại trọn vẹn.</p>\n\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://www.vietravel.com.vn/Images/inuserPicture/mua-hoa-xuan-tay-bac_6.jpg\" style=\"border:0px; box-sizing:border-box; height:433px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">C&oacute; l&uacute;c hoa phủ hồng cả sườn n&uacute;i, khiến kh&aacute;ch l&atilde;ng du ngất ng&acirc;y chẳng muốn dời ch&acirc;n. Một cơn gi&oacute; thoảng qua, khung cảnh bỗng h&oacute;a th&agrave;nh cơn mưa hoa lất phất. Chắt chiu nhựa sống qua năm d&agrave;i th&aacute;ng rộng, hội tụ đủ tinh t&uacute;y của đất trời để mỗi độ xu&acirc;n về th&acirc;n c&acirc;y x&ugrave; x&igrave; ấy lại nảy lộc đơm hoa sưởi ấm cả n&uacute;i rừng. Những c&aacute;nh đ&agrave;o phai T&acirc;y Bắc hồng phớt, mỏng manh m&agrave; l&agrave;n hương lại dịu d&agrave;ng, thanh tao đến lạ. Đ&ocirc;ng Bắc lại tự h&agrave;o với n&eacute;t ki&ecirc;u sa rực rỡ của rừng hoa đ&agrave;o b&iacute;ch lộng lẫy c&oacute; c&aacute;nh d&agrave;y, to, đủ sắc đỏ, hồng, trắng&hellip;</p>\n\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://www.vietravel.com.vn/Images/inuserPicture/mua-hoa-xuan-tay-bac_4.jpg\" style=\"border:0px; box-sizing:border-box; height:472px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">Ven đường đi, h&ograve;a c&ugrave;ng mu&ocirc;n sắc hoa đ&agrave;o b&iacute;ch, đ&agrave;o phai l&agrave; n&eacute;t đẹp hoang d&atilde; của những lo&agrave;i hoa dại t&iacute;m ng&aacute;t, v&agrave;ng rực cả khoảng trời. Đến n&uacute;i N&agrave;ng T&ocirc; Thị, động Tam Thanh, cảm x&uacute;c của t&ocirc;i gần như vỡ &ograve;a khi được chi&ecirc;m ngưỡng những đ&oacute;a hoa đ&agrave;o trắng muốt như tuyết, c&acirc;y đ&agrave;o gh&eacute;p hội tụ đủ ba m&agrave;u trắng - hồng - đỏ rất ấn tượng.</p>\n\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://www.vietravel.com.vn/Images/inuserPicture/mua-hoa-xuan-tay-bac_3_1.jpg\" style=\"border:0px; box-sizing:border-box; height:975px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">Hoa kh&ocirc;ng chỉ t&ocirc; điểm cho n&uacute;i rừng m&agrave; c&ograve;n mang cả kh&ocirc;ng gian văn h&oacute;a v&ugrave;ng cao đến với mọi người. T&ocirc;i cứ nhớ m&atilde;i nhịp ch&acirc;n vui của ch&agrave;ng trai bản xuống chợ ng&agrave;y xu&acirc;n m&agrave; tr&ecirc;n vai lắc lư một c&agrave;nh đ&agrave;o thắm. Những c&ocirc; g&aacute;i Dao, M&ocirc;ng v&aacute;y xanh v&aacute;y đỏ tỏa s&aacute;ng dưới hoa xu&acirc;n v&agrave; bọn trẻ con mắt trong veo, n&ocirc; đ&ugrave;a hồn nhi&ecirc;n tr&ecirc;n c&acirc;y mận thật đ&aacute;ng y&ecirc;u l&agrave;m sao!</p>\n\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://www.vietravel.com.vn/Images/inuserPicture/mua-hoa-xuan-tay-bac_2_1.jpg\" style=\"border:0px; box-sizing:border-box; height:894px; vertical-align:middle; width:650px\" /></p>\n\n<p style=\"text-align:justify\">Chỉ cần như thế cũng b&otilde; c&ocirc;ng cho một chuyến ngao du sơn thủy, s&aacute; g&igrave; n&uacute;i cao hay đ&egrave;o vắng, chỉ cần v&aacute;c ba l&ocirc; l&ecirc;n đường, ta lại sở hữu m&ugrave;a xu&acirc;n thi vị cho ri&ecirc;ng m&igrave;nh. Hoa nở khắp đất trời, hoa nở trong l&ograve;ng người để t&ocirc;i m&atilde;i nhung nhớ về miền rẻo cao phương Bắc. Đ&oacute; ch&iacute;nh l&agrave; những x&uacute;c cảm đầu năm thi&ecirc;ng li&ecirc;ng v&agrave; rất đỗi tự h&agrave;o về qu&ecirc; hương m&agrave; kh&ocirc;ng h&agrave;nh tr&igrave;nh n&agrave;o c&oacute; được.</p>\n</div>\n', 'giac-mong-hoa-phuong-bac', '0', '0', '1446792582', '22', '0', '0', '', '', '');
INSERT INTO `inuser` VALUES ('6', 'Train Ticket', 'Operated by national carrier Vietnam Railways.Travelling in an air-con sleeping berth and of course, there’s some spectacular scenery to lap up too. There are four main ticket classes: hard seat, soft seat, hard sleeper and soft sleeper. These are also split into air-con and non air-con options. Presently, air-con is only available on the faster express trains. Hard-seat class is usually packed and tolerable for day travel, but expect plenty of cigarette smoke. Ticket prices vary depending on the train; the fastest trains are more expensive. Aside from the main HCMC–Hanoi run, three rail-spur lines link Hanoi with the other parts of northern Vietnam. A third runs northwest to Lao Cai (Sapa).', '0', 'upload/img/ticket.jpg', '', 'train-ticket', '0', '0', '1447426430', '23', '0', '0', '', '', '');
INSERT INTO `inuser` VALUES ('7', 'Train North to South', 'Everyday departure with trains number: Trains SE1-SE6: Soft sleepers (4-berth), hard sleepers (6-berth), soft class seats (all air-con). TN3-TN10: Soft sleepers (air-con), hard sleepers (air-con & non-air-con), soft seats (a/c & non-a/c), hard seats (non-air-con).', '0', 'upload/img/tk1.jpg', '<span style=\"color:rgb(85, 85, 85); font-family:arial\">Unit Price: US Dollar (US$); A/C: Air-conditioning.</span><br />\n<span style=\"color:rgb(85, 85, 85); font-family:arial\">Child&#39;s fare: under 5 years: free of charge if sharing bed with parent; 5 years/up: adult rate.</span><br />\n<span style=\"color:rgb(85, 85, 85); font-family:arial\">Please note: 20% of the amount will be charged in case of cancellation for any ticket.</span><br />\n&nbsp;\n<div>&nbsp;</div>\n\n<div>\n<table style=\"border-collapse:collapse; border-spacing:0px; border:1px solid rgb(223, 223, 223); color:rgb(96, 96, 96); font-family:arial; font-size:17.6px; height:105px; line-height:normal; margin:0px auto; padding:0px; vertical-align:baseline; width:800px\">\n	<tbody>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">DEP FROM HANOI</td>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">SE NO. 1/ TIME TABLE</td>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">SE NO. 3/&nbsp;TIME TABLE</td>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">SE NO. 5/&nbsp;TIME TABLE</td>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">&nbsp;PRICE</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\">HA NOI</td>\n			<td style=\"text-align:center; vertical-align:baseline\">19.35</td>\n			<td style=\"text-align:center; vertical-align:baseline\">22.00</td>\n			<td style=\"text-align:center; vertical-align:baseline\">6.00</td>\n			<td style=\"text-align:center; vertical-align:baseline\">&nbsp;55 USD</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\"><span style=\"color:rgb(128, 128, 128)\">HUE</span></td>\n			<td style=\"text-align:center; vertical-align:baseline\">8.48</td>\n			<td style=\"text-align:center; vertical-align:baseline\">10.27</td>\n			<td style=\"text-align:center; vertical-align:baseline\">19.55</td>\n			<td style=\"text-align:center; vertical-align:baseline\">&nbsp;55 USD</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\"><span style=\"color:rgb(128, 128, 128)\">DA NANG&nbsp;</span></td>\n			<td style=\"text-align:center; vertical-align:baseline\">11.26</td>\n			<td style=\"text-align:center; vertical-align:baseline\">13.00</td>\n			<td style=\"text-align:center; vertical-align:baseline\">22.47</td>\n			<td style=\"text-align:center; vertical-align:baseline\">60 USD</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\"><span style=\"color:rgb(128, 128, 128)\">&nbsp;NHA TRANG</span></td>\n			<td style=\"text-align:center; vertical-align:baseline\">21.14</td>\n			<td style=\"text-align:center; vertical-align:baseline\">22.04</td>\n			<td style=\"text-align:center; vertical-align:baseline\">8.35</td>\n			<td style=\"text-align:center; vertical-align:baseline\">80 USD</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\"><span style=\"color:rgb(128, 128, 128)\">BINH THUAN&nbsp;</span></td>\n			<td style=\"text-align:center; vertical-align:baseline\">1.12</td>\n			<td style=\"text-align:center; vertical-align:baseline\">2.14</td>\n			<td style=\"text-align:center; vertical-align:baseline\">16.14</td>\n			<td style=\"text-align:center; vertical-align:baseline\">85 USD</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\"><span style=\"color:rgb(128, 128, 128)\">&nbsp;SAI GON</span></td>\n			<td style=\"text-align:center; vertical-align:baseline\">4.39</td>\n			<td style=\"text-align:center; vertical-align:baseline\">5.20</td>\n			<td style=\"text-align:center; vertical-align:baseline\">16.05</td>\n			<td style=\"text-align:center; vertical-align:baseline\">100 USD<br />\n			&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n</div>\n', 'train-north-to-south', '0', '0', '1447426503', '23', '0', '0', '', '', '');
INSERT INTO `inuser` VALUES ('8', 'Train to Sapa', 'The Ha Noi-Lao Cai trains runs every evening, departing from Ha Noi Train Station at Tran Quy Cap Street. Three run at night, and one makes a day trip. The following are the trains from Ha Noi to Lao Cai (PM: SP1, SP3 , SP7 ) and vice versa (PM: SP2, SP4 , SP8) daily. The daytime route offers only hard seats, whereas travelers can enjoy soft-sleepers, air-conditioned, four-berth cabins on the night trains. In the SP3 & SP4, there are 2 Victoria Carriages. In SP1 & SP2, there are Orient Express, Tulico Carriages, Friendly Carriages, Ratraco Carriages, and TSC Carriages, King Express Carriages, Royal Carriages. All of these are alternatives for tourists to Sapa from Hanoi.', '0', 'upload/img/tk2.jpg', '<p>Deluxe Train: Fansipan Express (SP1-SP2), Livitrans Express (SP1-SP2), Sapaly Expres (SP3-SP4)</p>\n\n<p>First Class Train: Orient Express (SP1-SP2), TSC Express ( SP1-SP2), Pumpkin Express train (SP1-SP2), VN Express Train ( SP3-SP4)</p>\n\n<p>&nbsp;</p>\n\n<table style=\"border-collapse:collapse; border-spacing:0px; border:1px solid rgb(223, 223, 223); color:rgb(96, 96, 96); font-family:arial; font-size:17.6px; height:105px; line-height:normal; margin:0px auto; padding:0px; vertical-align:baseline; width:800px\">\n	<tbody>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">HANOI - LAO CAI</td>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">DELUXE CABIN 4 BERTHS</td>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">\n			<p>FIRST CLASS 4 BERTHS</p>\n			</td>\n			<td style=\"text-align:center; vertical-align:baseline; width:250px\">VIP CLASS 2 BERTHS</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\"><span style=\"color:rgb(128, 128, 128)\">SP1: 21H40 - 5H30</span></td>\n			<td style=\"text-align:center; vertical-align:baseline\">30 USD</td>\n			<td style=\"text-align:center; vertical-align:baseline\">35 USD</td>\n			<td style=\"text-align:center; vertical-align:baseline\">70 USD</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\"><span style=\"color:rgb(128, 128, 128)\">SP1: 20H00 - &nbsp;6H10</span></td>\n			<td style=\"text-align:center; vertical-align:baseline\">30 USD</td>\n			<td style=\"text-align:center; vertical-align:baseline\">35 USD</td>\n			<td style=\"text-align:center; vertical-align:baseline\">70 USD</td>\n		</tr>\n		<tr>\n			<td style=\"text-align:center; vertical-align:baseline\"><span style=\"color:rgb(128, 128, 128)\">SP1: 20H17 - &nbsp;4H35</span></td>\n			<td style=\"text-align:center; vertical-align:baseline\">30 USD</td>\n			<td style=\"text-align:center; vertical-align:baseline\">35 USD</td>\n			<td style=\"text-align:center; vertical-align:baseline\">70 USD</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<p>The prices may change due to exchange rate or season; therefore, please confirm exact price when you make the final booking with payment. Please contact by email to have more information. Email:&nbsp;<a href=\"mailto:info@vietnampremiertravel.com\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-family: Arial; color: rgb(34, 34, 34);\">info@vietnampremiertravel.com</a>&nbsp;/ Tel: (+84 4) 3926 2866</p>\n', 'train-to-sapa', '0', '0', '1447426437', '23', '0', '0', '', '', '');
INSERT INTO `inuser` VALUES ('9', 'Tàu Bắc - Nam', 'Khởi hành hàng ngày với tàu số : Xe lửa SE1 - SE6 : tà vẹt mềm ( 4 bến ) , tà vẹt cứng ( 6 bến ) , ghế hạng mềm ( tất cả các máy con) . TN3 - TN10 : tà vẹt mềm ( máy lạnh ) , tà vẹt cứng ( máy lạnh & không khí -con) , ghế ngồi mềm (a / c và phi - a / c ) , ghế ngồi cứng ( không máy lạnh ) .', '0', 'upload/img/tk11.jpg', '<pre>\n<span style=\"font-size:14px\">Đơn gi&aacute; : Dollar Mỹ (US $ ) ; A / C : Điều h&ograve;a kh&ocirc;ng kh&iacute; .\nGi&aacute; v&eacute; cho trẻ em: dưới 5 tuổi: miễn ph&iacute; nếu ngủ chung giường với bố mẹ ; 5 năm / up : tỷ lệ người lớn .\nXin lưu &yacute; : 20 % của số tiền sẽ được t&iacute;nh trong trường hợp hủy cho bất kỳ v&eacute; .</span></pre>\n', 'tau-bac-nam', '0', '0', '1446800384', '22', '0', '0', '', '', '');
INSERT INTO `inuser` VALUES ('10', 'teafdsagd', 'gdasgdsg', '0', null, 'sagdsagdsagd', 'teafdsagd', 'en', '0', '1453861931', '0', '0', '0', '', '', '');
INSERT INTO `inuser` VALUES ('11', 'Dàn xe đời mới - Đa dạng chủng loại', 'Chúng tôi cho thuê xe từ những dòng xe giá rẻ đến những dòng xe cao cấp, từ 4 chỗ đến xe 12 chỗ Dàn xe của chúng tôi luôn có bộ phận theo dõi, quản lý và bảo hành. Để đảm bảo trước khi đến đón khách, Xe luôn trong tình trạng sạch, đẹp và an toàn.', '0', 'upload/img/icon3.png', '', 'dan-xe-doi-moi-da-dang-chung-loai', 'vi', '0', '1453863158', '20', '0', '1', '', '', '');
INSERT INTO `inuser` VALUES ('12', 'Tài xế thân thiện và chuyên nghiệp', 'Các tài xế của chúng tôi được tuyển chọn khắt khe theo các tiêu chí. Lái xe an toàn, có kinh nghiệm, thông thạo tuyến đường và được công tu Training các kỹ năng phục vụ khách hàng. Tùy theo mục đích thuê xe và loại xe cũng như yêu cầu của quí khách', '0', 'upload/img/icon2.png', '', 'tai-xe-than-thien-va-chuyen-nghiep', 'vi', '0', '1453863170', '20', '0', '1', '', '', '');
INSERT INTO `inuser` VALUES ('13', 'Giá cho thuê xe tốt nhất trên thị trường', 'Qui trình và cách tính giá cũng như báo giá của chúng tôi luôn là mức giá tốt nhất trên thị trường. Chính vì vậy khi quí khách thuê xe của chúng tôi cũng có nghĩa quí khách đã có được mức giá tốt nhât trong những nhà cung cấp.', '0', 'upload/img/icon1.png', '', 'gia-cho-thue-xe-tot-nhat-tren-thi-truong', 'vi', '0', '1453863176', '20', '0', '1', '', '', '');
INSERT INTO `inuser` VALUES ('14', 'Hướng dẫn lái xe ô tô an toàn trên đường cao tốc', 'Trên đường cao tốc, người điều khiển phương tiện giao thông được phép lái xe với vận tốc tối đa cao hơn so với lái trên đường phố, đường làng và do đó tiết kiệm thời gian di chuyển hơn nhưng cũng tiềm ẩn nhiều rủi ro xảy ra tai nạn đáng tiếc nếu không tuân thủ đúng luật.', '0', 'upload/img/new1.jpg', '<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:inherit; font-size:inherit\">Th&oacute;i quen h&agrave;ng ng&agrave;y khi l&aacute;i xe đ&ocirc;i khi đ&atilde; trở th&agrave;nh nguy&ecirc;n nh&acirc;n của những trường hợp tai nạn đ&aacute;ng tiếc khi tham gia giao th&ocirc;ng tr&ecirc;n đường cao tốc: chạy xe dưới tốc độ tối thiểu, kh&ocirc;ng giữ khoảng c&aacute;ch an to&agrave;n với xe ph&iacute;a trước, dừng/đỗ t&ugrave;y tiện, quay đầu xe&hellip; Nhưng lưu &yacute; sau sẽ gi&uacute;p bạn c&oacute; những chuyến đi an to&agrave;n c&ugrave;ng bạn b&egrave;, người th&acirc;n.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:inherit; font-size:inherit\">&ndash; Ngo&agrave;i c&aacute;c vấn đề kỹ thuật đảm bảo an to&agrave;n cho xe &ocirc; t&ocirc;, đặc biệt phải lưu &yacute; đến lốp xe bởi khi chạy với tốc độ cao, nhiệt độ ngo&agrave;i trời cao, h&agrave;ng h&oacute;a chở nhiều&hellip;; do đ&oacute;, với những bộ lốp &ldquo;tuổi đời&rdquo; cao, m&ograve;n nhiều cần đặc biệt cẩn trọng (nổ lốp xe khi đang đi tốc độ cao l&agrave; một trong những nguy&ecirc;n nh&acirc;n phổ biến dẫn đến tai nạn).</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:inherit; font-size:inherit\">&ndash; Đảm bảo tốc độ theo hệ thống biển b&aacute;o tr&ecirc;n đường, giảm tốc độ ph&ugrave; hợp ở những đoạn đường cong, c&oacute; nhiều phương tiện (cho d&ugrave; ở l&agrave;n đường kh&aacute;c) hoặc chướng ngại vật&hellip; Tr&aacute;nh nh&igrave;n tập trung v&agrave;o một điểm qu&aacute; l&acirc;u, đặc biệt c&aacute;c đoạn đường cong hay l&ecirc;n/xuống dốc (dễ dẫn đến trường hợp &ldquo;kh&oacute;a mục ti&ecirc;u&rdquo; khiến xe đi thẳng đến điểm đ&oacute;).</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:inherit; font-size:inherit\">&nbsp;&ndash; Giữ khoảng c&aacute;ch an to&agrave;n với quy tắc 3 gi&acirc;y (Bạn nh&igrave;n xe ph&iacute;a trước chạy qua một vật cố định n&agrave;o đ&oacute; ở b&ecirc;n đường: cột đ&egrave;n, biển b&aacute;o&hellip; v&agrave; bắt đầu đếm&nbsp;ước lượng từ 1 đến 3, khoảng thời gian tưởng ứng đủ 3 gi&acirc;y). Nếu trời mưa hoặc tầm quan s&aacute;t bị ảnh hưởng, th&igrave; n&ecirc;n tăng l&ecirc;n 4-5 gi&acirc;y. H&atilde;y ch&uacute; &yacute; c&aacute;c biển chỉ dẫn lưu &yacute; khoảng c&aacute;ch 50 &ndash; 100 &ndash; 200m.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:inherit; font-size:inherit\">&ndash;<span style=\"font-family:inherit; font-size:inherit\">&nbsp;</span><span style=\"font-family:inherit; font-size:inherit\">Kh&ocirc;ng bao giờ l&ugrave;i xe, quay đầu xe, đi ngược chiều tr&ecirc;n đường cao tốc</span>.<span style=\"font-family:inherit; font-size:inherit\">&nbsp;</span><span style=\"font-family:inherit; font-size:inherit\">Kh&ocirc;ng được cho xe &ocirc; t&ocirc; chạy ở l&agrave;n dừng xe khẩn cấp v&agrave; phần lề đường</span>.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:inherit; font-size:inherit\">&ndash;<span style=\"font-family:inherit; font-size:inherit\">&nbsp;</span><span style=\"font-family:inherit; font-size:inherit\">Khi v&agrave;o hoặc ra khỏi đường cao tốc phải giảm tốc độ</span><span style=\"font-family:inherit; font-size:inherit\">&nbsp;</span>v&agrave;<span style=\"font-family:inherit; font-size:inherit\"><span style=\"font-family:inherit; font-size:inherit\">&nbsp;</span></span><span style=\"font-family:inherit; font-size:inherit\">nhường đường cho xe đi tr&ecirc;n l&agrave;n đường ch&iacute;nh</span>.<span style=\"font-family:inherit; font-size:inherit\"><span style=\"font-family:inherit; font-size:inherit\">&nbsp;</span></span><span style=\"font-family:inherit; font-size:inherit\">Chỉ được chuyển l&agrave;n đường ở những nơi cho ph&eacute;p</span>,<span style=\"font-family:inherit; font-size:inherit\">&nbsp;</span>khi chuyển l&agrave;n lu&ocirc;n ch&uacute; &yacute; ph&iacute;a sau v&agrave; lu&ocirc;n xi-nhan. Kh&ocirc;ng chuyển l&agrave;n kiểu cắt đầu xe kh&aacute;c v&agrave; chuyển nhiều l&agrave;n đường c&ugrave;ng một thời điểm.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:inherit; font-size:inherit\">&ndash; Người điều khiển v&agrave; người ngồi trong xe &ocirc;t&ocirc; đều phải thắt d&acirc;y an to&agrave;n. Bởi khi lưu th&ocirc;ng với tốc độ cao (100km/h), th&igrave; thắt d&acirc;y an to&agrave;n cho mọi người tr&ecirc;n xe &ocirc; t&ocirc; l&agrave; việc cần thiết hơn bao giờ hết.</span></p>\r\n', 'huong-dan-lai-xe-o-to-an-toan-tren-duong-cao-toc', 'vi', '0', '1453864782', '22', '1', '0', '', '', '');
INSERT INTO `inuser` VALUES ('15', 'Gợi y 8 lộ trình về quê ăn tết tránh kẹt xe ở hà nội', '', '0', 'upload/img/new4.jpg', '', 'goi-y-8-lo-trinh-ve-que-an-tet-tranh-ket-xe-o-ha-noi', 'vi', '0', '1453864774', '22', '1', '0', '', '', '');
INSERT INTO `inuser` VALUES ('16', 'Hơn 2000 người tham gia hưởng ứng \"Năm an toàn giao thông\" 2016', '', '0', 'upload/img/new31.jpg', '', 'hon-2000-nguoi-tham-gia-huong-ung-nam-an-toan-giao-thong-2016', 'vi', '0', '1453864761', '22', '1', '0', '', '', '');
INSERT INTO `inuser` VALUES ('17', 'Tăng phí trả vé tàu để hạn chế \"cò\" vé chợ đen.', '', '0', 'upload/img/new2.jpg', '', 'tang-phi-tra-ve-tau-de-han-che-co-ve-cho-den', 'vi', '0', '1453864807', '22', '1', '0', '', '', '');

-- ----------------------------
-- Table structure for inuser_category
-- ----------------------------
DROP TABLE IF EXISTS `inuser_category`;
CREATE TABLE `inuser_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `home` int(11) DEFAULT NULL,
  `focus` int(11) DEFAULT NULL,
  `hot` int(11) DEFAULT NULL,
  `tour` int(11) DEFAULT NULL,
  `sort` int(5) DEFAULT '1',
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT '1',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of inuser_category
-- ----------------------------
INSERT INTO `inuser_category` VALUES ('27', 'Nguyễn công hoan', 'nguyen-cong-hoan', '<p><em>Seaside Resort g&acirc;y ấn tượng với t&ocirc;i nhất nhờ dịch vụ rất ho&agrave;n hảo v&agrave; chuy&ecirc;n nghiệp. Seaside Resort l&agrave; một kh&aacute;ch sạn với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp, năng động, s&aacute;ng tạo, phong c&aacute;ch phục vụ v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng tốt. Hơn nữa ch&iacute;nh s&aacute;ch chăm s&oacute;c kh&aacute;ch h&agrave;ng nhiệt t&igrave;nh, chu đ&aacute;o ngay cả khi đ&atilde; ho&agrave;n th&agrave;nh hợp đồng.</em></p>\r\n', 'upload/img/inuser/avt1.png', '0', '1', null, null, null, '6', 'vi', 'Big Boss');
INSERT INTO `inuser_category` VALUES ('28', 'Mrs bin', 'doctor', 'Seaside Resort impresses me most with its excellent service and professionalism. Seaside Resort is a hotel with professional staffs', 'upload/img/traveler_story111.png', '0', '1', '0', '0', '0', '1', 'en', 'doctor');
INSERT INTO `inuser_category` VALUES ('29', 'Nguyễn thành đạt', 'nguyen-thanh-dat', '<p>Thật tuyệt khi sử dụng dịch vụ tại Thăng Long, t&ocirc;i cảm thấy m&igrave;nh được phục vụ v&ocirc; c&ugrave;ng chu đ&aacute;o v&agrave; tận t&igrave;nh.Chắc chắn t&ocirc;i sẽ quay lại mua h&agrave;ng tại Thăng Long lần nữa.Ch&uacute;c Thăng Long ph&aacute;t triển mạnh mẽ hơn nữa, t&ocirc;i tin chắc điều đ&oacute;.</p>\r\n', 'upload/img/inuser/avt.png', '0', '1', null, null, null, '5', 'vi', 'VNPT Technology ');

-- ----------------------------
-- Table structure for inuser_to_category
-- ----------------------------
DROP TABLE IF EXISTS `inuser_to_category`;
CREATE TABLE `inuser_to_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_inuser` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of inuser_to_category
-- ----------------------------
INSERT INTO `inuser_to_category` VALUES ('25', '1', '20');
INSERT INTO `inuser_to_category` VALUES ('29', '3', '22');
INSERT INTO `inuser_to_category` VALUES ('30', '2', '22');
INSERT INTO `inuser_to_category` VALUES ('32', '4', '22');
INSERT INTO `inuser_to_category` VALUES ('34', '5', '22');
INSERT INTO `inuser_to_category` VALUES ('38', '9', '22');
INSERT INTO `inuser_to_category` VALUES ('39', '6', '23');
INSERT INTO `inuser_to_category` VALUES ('40', '8', '23');
INSERT INTO `inuser_to_category` VALUES ('41', '7', '23');
INSERT INTO `inuser_to_category` VALUES ('50', '11', '20');
INSERT INTO `inuser_to_category` VALUES ('51', '12', '20');
INSERT INTO `inuser_to_category` VALUES ('52', '13', '20');
INSERT INTO `inuser_to_category` VALUES ('53', '16', '22');
INSERT INTO `inuser_to_category` VALUES ('54', '15', '22');
INSERT INTO `inuser_to_category` VALUES ('55', '14', '22');
INSERT INTO `inuser_to_category` VALUES ('56', '17', '22');

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `date` char(30) DEFAULT NULL,
  `time` char(20) DEFAULT NULL,
  `datetime` int(11) DEFAULT NULL,
  `timeupdate` int(11) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_code` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_place` varchar(255) DEFAULT NULL,
  `customer_ward` varchar(255) DEFAULT NULL,
  `customer_birthday` char(30) DEFAULT NULL,
  `user_create` int(11) DEFAULT NULL,
  `user_sale` int(11) DEFAULT NULL,
  `note` text,
  `total_price` int(11) DEFAULT '0',
  `price_sale` int(11) DEFAULT '0',
  `customer_pay` int(11) DEFAULT '0',
  `customer_payted` int(11) DEFAULT '0',
  `price_return` int(11) DEFAULT '0',
  `price_returned` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  `time_buy` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT '0',
  `debt` int(11) DEFAULT '0',
  `nkd` float DEFAULT '0',
  `nkc` float DEFAULT '0',
  `refund` int(11) DEFAULT NULL,
  `usersale_name` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '0' COMMENT '0 : bán hàng / 1 trả hàng',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=214 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO `invoices` VALUES ('209', 'HD209', '13/04/2018', '14:19', '1523552400', '1523603975', null, '33', 'Khách lẻ', null, null, null, null, null, null, null, '2', '2', ' test đơn hàng', '400000', '0', '400000', '0', '0', '0', '1', '1523603975', '5', '0', '400000', '450000', '850000', '0', null, '0');
INSERT INTO `invoices` VALUES ('212', 'HD212', '13/04/2018', '15:39', '1523552400', '1523606629', null, '33', 'Khách lẻ', 'KHACHLE', null, null, null, null, null, null, '2', null, '', '400000', null, '400000', '400000', '0', '0', '1', '1523606629', '1', '0', '0', '0', '0', null, 'Admin ', '0');
INSERT INTO `invoices` VALUES ('213', 'HD213', '13/04/2018', '15:24', '1523552400', '1523607051', null, '33', 'Khách lẻ', 'KHACHLE', null, null, null, null, null, null, '2', null, '', '400000', null, '400000', '400000', '0', '0', '1', '1523607051', '1', '0', '0', '0', '0', null, 'Admin ', '0');
INSERT INTO `invoices` VALUES ('208', 'HD208', '13/04/2018', '14:17', '1523552400', '1523603853', null, '33', 'Khách lẻ', null, null, null, null, null, null, null, '2', '2', 'agdasgdsagdsagdsag', '450000', '0', '450000', '0', '0', '0', '1', '1523603853', '2', '0', '450000', '0', '450000', '0', null, '0');

-- ----------------------------
-- Table structure for invoices_detail
-- ----------------------------
DROP TABLE IF EXISTS `invoices_detail`;
CREATE TABLE `invoices_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `price_sale` int(11) DEFAULT '0',
  `price_imp` int(11) DEFAULT '0' COMMENT 'Giá Vốn của sản phẩm thời điểm tạo hoá đơn',
  `price_return_imp` int(11) DEFAULT '0',
  `price_return` int(11) DEFAULT '0' COMMENT 'Giá sp khi khách trả hàng',
  `qty_return` int(11) DEFAULT '0',
  `sale` int(11) DEFAULT '0',
  `inv_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=329 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of invoices_detail
-- ----------------------------
INSERT INTO `invoices_detail` VALUES ('328', 'Áo Len L06', 'HH185', '1', '400000', '400000', '500000', '0', '0', '0', '0', '213', '185');
INSERT INTO `invoices_detail` VALUES ('327', 'Áo Len L06', 'HH185', '1', '400000', '400000', '500000', '0', '0', '0', '0', '212', '185');
INSERT INTO `invoices_detail` VALUES ('326', 'Áo Len L06', 'HH185', '5', '650000', '400000', '500000', '0', '0', '0', '0', '209', '185');
INSERT INTO `invoices_detail` VALUES ('325', 'Áo Len L07', 'HH186', '2', '550000', '450000', '100000', '0', '0', '0', '0', '208', '186');

-- ----------------------------
-- Table structure for language
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of language
-- ----------------------------
INSERT INTO `language` VALUES ('1', 'vi', 'Tiếng Việt');
INSERT INTO `language` VALUES ('2', 'en', 'English');

-- ----------------------------
-- Table structure for map_shopping
-- ----------------------------
DROP TABLE IF EXISTS `map_shopping`;
CREATE TABLE `map_shopping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `tim_kiem` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `toa_domap` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `toa_dohienthi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `diachi_shop` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` char(150) CHARACTER SET utf8 DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of map_shopping
-- ----------------------------
INSERT INTO `map_shopping` VALUES ('2', 'Chi nhánh camera siêu net tại Hà Nội', '168 Nguyễn Tuân - Thanh Xuân Hà Nội', '(20.998863, 105.80291809999994)', '20.998863, 105.80291809999994', '168 Nguyễn Tuân - Thanh Xuân Hà Nội', '0918.041616 - 0987.041616', 'vi');
INSERT INTO `map_shopping` VALUES ('5', 'Chi nhánh camera siêu net tại Hải Phòng', '52 Lê Quang Đạo - Nam Từ Liêm - Hà Nội', '', '', 'Số 66, Trường Chinh, Kiến An, Hải Phòng', '031 3603208', 'vi');
INSERT INTO `map_shopping` VALUES ('6', 'Chi nhánh camera siêu net tại TP. HCM', 'Tp HCM', '(10.7764745, 106.70088310000006)', '10.7764745, 106.70088310000006', '212/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. HCM', '08 39722693', 'vi');
INSERT INTO `map_shopping` VALUES ('7', 'Chi nhánh camera siêu net tại Yên Bái', 'Yên Bái', '(21.6837923, 104.4551361)', '21.6837923, 104.4551361', '168 Nguyễn Tuân - Yên Bái', '0918.041616 - 0987.041616', 'vi');
INSERT INTO `map_shopping` VALUES ('11', 'cừa hàng thời trang', 'cua hang so 23 ngo 229 cầu giấy hà nội', '(21.0477839, 105.79456129999994)', '21.0477839, 105.79456129999994', 'cua hang so 23 ngo 229 cầu giấy hà nội', '0988787654', 'vi');

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `title_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `keyword_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `home` tinyint(1) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `alias` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES ('1', 'album hè cắm trại 2018', '<p>nội dung m&ocirc; tả</p>\r\n', '<p>nội dung chi tiết</p>\r\n', 'Không gian nhà hàng', 'Không gian nhà hàng', 'Không gian nhà hàng', 'vi', '11', '1', null, null, '1', 'upload/img/media/dia-diem-du-lich-54.jpg', '1', 'album-he-cam-trai-2018', '');
INSERT INTO `media` VALUES ('10', 'album anh  cam trại hè', '', '', '', '', '', 'vi', '11', '1', null, null, '2', 'upload/img/media/dia-diem-du-lich-4.jpg', '1', 'album-anh-cam-trai-he', '');
INSERT INTO `media` VALUES ('11', 'up anh jpeg cha le khong duoc-12', '<p>m&ocirc;i tả</p>\r\n', '', '', '', '', 'vi', '1', null, null, '1', '3', 'upload/img/media/1233.JPEG', '1', 'up-anh-jpeg-cha-le-khong-duoc-12', 't0WFOnwp3MM');

-- ----------------------------
-- Table structure for media_category
-- ----------------------------
DROP TABLE IF EXISTS `media_category`;
CREATE TABLE `media_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `home` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `coupon` tinyint(1) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `title_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_seo` text CHARACTER SET utf8,
  `keyword_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `parent_id` int(11) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  `left_right` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of media_category
-- ----------------------------
INSERT INTO `media_category` VALUES ('1', 'Hình ảnh', 'hinh-anh', '2', null, null, null, 'upload/img/media/anh1.jpg', 'Hình ảnh', 'gdsagds', null, 'vi', '<p>noi dung m&ocirc; tả</p>\r\n', '0', null, '1');
INSERT INTO `media_category` VALUES ('11', 'album anh nam 2019', 'album-anh-nam-2019', '5', '1', null, null, 'upload/img/media/dia-diem-du-lich-5.jpg', '', '', null, 'vi', '<p>m&ocirc; tả</p>\r\n', '1', null, '1');
INSERT INTO `media_category` VALUES ('10', 'album nam 2018', 'album-nam-2018', '4', '1', null, null, 'upload/img/media/anh.jpg', '', '', null, 'vi', '<p>noi dung m&ocirc; tả cho album</p>\r\n', '1', null, '1');
INSERT INTO `media_category` VALUES ('12', 'Hình ảnh hội nghị', 'hinh-anh-hoi-nghi', '6', '1', null, null, 'upload/img/media/dia-diem-du-lich-3.jpg', '', '', null, 'vi', '', '1', null, '1');

-- ----------------------------
-- Table structure for media_images
-- ----------------------------
DROP TABLE IF EXISTS `media_images`;
CREATE TABLE `media_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `url` char(200) CHARACTER SET utf8 DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of media_images
-- ----------------------------
INSERT INTO `media_images` VALUES ('1', 'anh so 1', '1', 'upload/img/media_multi/ae20248dc61407525e7a96a1b002c72b.jpg', null, null);
INSERT INTO `media_images` VALUES ('2', 'anh so 2', '1', 'upload/img/media_multi/67594498cb19b94e98cc1c2095c83c51.jpg', null, null);
INSERT INTO `media_images` VALUES ('4', 'anh so 4', '1', 'upload/img/media_multi/44bb59baff034000b0f46258088bf8b8.jpg', null, null);
INSERT INTO `media_images` VALUES ('5', 'anh so 5', '1', 'upload/img/media_multi/036d5e089f887f4687e3379500c8256d.jpg', null, null);
INSERT INTO `media_images` VALUES ('6', 'anh so 6', '1', 'upload/img/media_multi/fa02a841c335c7566a42548fe1c0083d.jpg', null, null);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seturl` tinyint(2) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `module` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `home` tinyint(1) DEFAULT '0',
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT '1',
  `view_type` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `style` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'Giới thiệu', 'page/gioi-thieu.html', null, 'gioi-thieu', 'main', '', null, '0', '', 'pages', '0', '0', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('7', 'Liên hệ', 'contact', null, 'lien-he', 'main', '', null, '0', '', '0', '0', '5', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('39', 'Trang chủ', 'trang-chu', 'upload/img/menus/img_top1.png', 'trang-chu', 'bottom_2', '', null, '0', '', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('40', 'Giới thiệu', 'gioi-thieu', 'upload/img/menus/img_top2.png', 'gioi-thieu', 'bottom_2', '', null, '0', '', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('41', 'Thông báo', 'thong-bao', 'upload/img/menus/img_top3.png', 'thong-bao', 'bottom_2', '', null, '0', '', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('42', 'Thanh toán mua hàng', 'thanh-toan-mua-hang', 'upload/img/menus/img_top4.png', 'thanh-toan-mua-hang', 'bottom_2', '', null, '0', '', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('43', 'Khuyến mãi', 'khuyen-mai', null, 'khuyen-mai', 'bottom_2', '', null, '0', '', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('44', 'Góp ý', 'gop-y', null, 'gop-y', 'bottom_2', '', null, '0', '', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('45', 'Liên hệ', 'lien-he', null, 'lien-he', 'bottom_2', '', null, '0', '', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('46', 'Đặt hàng online', '#', 'upload/img/menus/a4.png', 'dat-hang-online', 'top', '', null, '0', '', '0', '0', '0', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('47', 'Giao hàng tận nơi', '#', 'upload/img/menus/a3.png', 'giao-hang-tan-noi', 'top', '', null, '0', '', '0', '0', '1', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('48', 'Hỗ trợ online', '#', 'upload/img/menus/a5.png', 'ho-tro-online', 'top', '', null, '0', '', '0', '0', '2', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('55', 'Đại lý', 'page/dai-ly.html', null, 'dai-ly', 'main', '', null, '0', '', 'pages', '0', '4', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('89', 'Maxi', 'danh-muc/maxi.html', null, 'maxi', 'main', '', null, '62', '', 'products', '48', '6', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('58', 'Hướng dẫn mua hàng', 'huong-dan-mua-hang', 'upload/img/menus/img_box_footer4.png', 'huong-dan-mua-hang', 'bottom', '', null, '0', '<p>text demo sản phẩm</p>\r\n', '0', '0', '0', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('62', 'Sản phẩm', 'san-pham', null, 'san-pham', 'main', '', null, '0', '', '0', '0', '1', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('63', 'Tin tức - Sự kiện', 'danh-muc-tin/tin-tuc-su-kien.html', null, 'tin-tuc-su-kien', 'main', '', null, '0', '', 'news', '0', '2', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('68', 'Uy tín hàng đầu ', 'page/gioi-thieu.html', 'upload/img/menus/img_box_footer2.png', 'uy-tin-hang-dau', 'bottom', '', null, '73', '<p>text demo sản phẩm</p>\r\n', 'pages', '0', '0', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('69', 'Tư vấn miễn phí 24/7', 'page/tu-van-mien-phi-24-7.html', 'upload/img/menus/img_box_footer.png', 'tu-van-mien-phi-24-7', 'bottom', '', null, '73', '<p>text demo sản phẩm</p>\r\n', 'pages', '0', '1', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('71', 'home', 'home', null, 'home', 'main', '', null, '0', '', '0', '0', '0', '0', 'en', null, null);
INSERT INTO `menu` VALUES ('72', 'home 2', 'home-2', null, 'home-2', 'main', '', null, '0', '', '0', '0', '1', '0', 'en', null, null);
INSERT INTO `menu` VALUES ('73', 'Về chúng tôi - QTS ', 'hoi-dap', null, 've-chung-toi-qts', 'bottom', '', null, '0', '', '0', '0', '1', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('88', 'Áo Len', 'danh-muc/ao-len.html', null, 'ao-len', 'main', '', null, '62', '', 'products', '50', '7', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('87', 'Chân váy', 'danh-muc/chan-vay.html', null, 'chan-vay', 'main', '', null, '62', '', 'products', '51', '8', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('86', 'Áo Lót', 'danh-muc/ao-lot.html', null, 'ao-lot', 'main', '', null, '62', '', 'products', '52', '9', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('78', 'Các phương thức bán hàng ', 'page/thoi-gian-dat-hang.html', null, 'cac-phuong-thuc-ban-hang', 'bottom', '', null, '58', '', 'pages', '0', '0', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('79', 'Hướng dẫn đặt hàng ', 'page/thoi-gian-dat-hang.html', null, 'huong-dan-dat-hang', 'bottom', '', null, '58', '', 'pages', '0', '1', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('80', 'Thời gian đặt hàng ', 'thoi-gian-dat-hang', null, 'thoi-gian-dat-hang', 'bottom', '', null, '80', '', 'pages', '0', '2', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('81', 'Phương thức vận chuyển ', 'page/phuong-thuc-van-chuyen.html', null, 'phuong-thuc-van-chuyen', 'bottom', '', null, '58', '', 'pages', '0', '2', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('82', 'Hỏi đáp về sản phẩm ', 'page/hoi-dap-ve-san-pham.html', null, 'hoi-dap-ve-san-pham', 'bottom', '', null, '73', '', 'pages', '0', '2', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('83', 'Giao nhận về hàng hóa ', 'page/gioi-thieu.html', null, 'giao-nhan-ve-hang-hoa', 'bottom', '', null, '73', '', 'pages', '0', '3', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('84', 'Mua hàng và thanh toán ', 'page/gioi-thieu.html', null, 'mua-hang-va-thanh-toan', 'bottom', '', null, '73', '', 'pages', '0', '4', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('85', 'Tuyển dụng', 'page/dai-ly.html', null, 'tuyen-dung', 'main', '', null, '0', '', 'pages', '0', '3', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('90', 'Áo Phông', 'danh-muc/vay-yem.html', null, 'ao-phong', 'main', '', null, '62', '', 'products', '45', '5', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('91', 'Quần Jeans', 'danh-muc/quan-jeans-1.html', null, 'quan-jeans', 'main', '', null, '62', '', 'products', '40', '4', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('92', 'Bồ đồ ngủ', 'danh-muc/bo-do-ngu.html', null, 'bo-do-ngu', 'main', '', null, '62', '', 'products', '33', '3', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('93', 'Áo Lông', 'danh-muc/ao-long.html', null, 'ao-long', 'main', '', null, '62', '', 'products', '29', '2', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('94', 'Áo phao', 'danh-muc/ao-phao.html', null, 'ao-phao', 'main', '', null, '62', '', 'products', '28', '1', '0', 'vi', null, null);
INSERT INTO `menu` VALUES ('95', 'Váy xòe', 'danh-muc/vay-xoe-nu.html', null, 'vay-xoe', 'main', '', null, '62', '', 'products', '27', '0', '0', 'vi', null, null);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `hot` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `alias` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT '1',
  `tag` text COLLATE utf8_unicode_ci,
  `time_update` int(8) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `home` int(11) DEFAULT NULL,
  `focus` int(11) DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` text COLLATE utf8_unicode_ci,
  `video` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `button_1` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('16', 'Những lùm xùm về chuyện tình cảm của bạn trai với những người khác là điều mà Nhã Phương phải nghe nhiều nhất kể từ khi hẹn hò với Trường Giang.', '<p><strong>Những l&ugrave;m x&ugrave;m về chuyện t&igrave;nh cảm của bạn trai với những người kh&aacute;c l&agrave; điều m&agrave; Nh&atilde; Phương phải nghe nhiều nhất kể từ khi hẹn h&ograve; với Trường Giang.</strong></p>\r\n', '1', 'upload/img/news/truong-giang-nha-phuong1.png', '<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang &ndash; Nh&atilde; Phương&nbsp;</span></span></strong><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">đang l&agrave; một trong những cặp đ&ocirc;i khiến kh&aacute;n giả mong ng&oacute;ng về &ldquo;chung nh&agrave;&rdquo; nhất showbiz.&nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/Truong-giang-nha-phuong%203.jpg\" style=\"height:554px; width:440px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Đặc biệt, v&agrave;o đầu năm 2018,&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;đ&atilde; c&oacute; m&agrave;n cầu h&ocirc;n bạn g&aacute;i &ldquo;g&acirc;y b&atilde;o&rdquo; khắp c&aacute;c diễn đ&agrave;n.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">C&oacute; người ủng hộ nhưng cũng c&oacute; người phản đối. Sau sự việc ấy, rất nhiều tin đồn cho rằng cả hai đ&atilde; &ldquo;đường ai nấy đi&rdquo; khi c&oacute; nhiều điểm tr&ugrave;ng hợp ở họ như: kh&ocirc;ng xuất hiện c&ugrave;ng nhau,&nbsp;<strong>Nh&atilde; Phương</strong>&nbsp;kh&ocirc;ng đeo nhẫn,&hellip;</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/Truong-giang-nha-phuong%202(1).jpg\" style=\"height:836px; width:580px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Từ khi hẹn h&ograve; với</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;Trường Giang</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">,&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Nh&atilde; Phương</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;li&ecirc;n tục xuất hiện tr&ecirc;n truyền th&ocirc;ng.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Mỗi khi xuất hiện trước c&ocirc;ng ch&uacute;ng, họ lu&ocirc;n l&agrave;m mọi người ngưỡng mộ v&igrave; độ hạnh ph&uacute;c v&agrave; ngọt ng&agrave;o. Đặc biệt,&nbsp;<strong>Trường Giang</strong>&nbsp;thường d&ugrave;ng những lời &ldquo;c&oacute; c&aacute;nh&rdquo; khi n&oacute;i về bạn g&aacute;i. Ai cũng nghĩ rằng&nbsp;<strong>Nh&atilde; Phương</strong>&nbsp;l&agrave; c&ocirc; g&aacute;i may mắn v&igrave; c&oacute; được người y&ecirc;u nổi tiếng v&agrave; y&ecirc;u thương c&ocirc;. Tuy nhi&ecirc;n, kh&ocirc;ng chỉ hạnh ph&uacute;c, người đẹp c&ograve;n phải hứng chịu những điều kh&ocirc;ng hay, đặc biệt l&agrave; những tin đồn của&nbsp;<strong>Trường Giang</strong>&nbsp;v&agrave; c&aacute;c mỹ nh&acirc;n kh&aacute;c trong showbiz Việt.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/Truong-giang-nha-phuong%203(1).jpg\" style=\"height:554px; width:440px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">V&agrave;i ng&agrave;y qua, kh&aacute;n giả khắp nơi đang x&ocirc;n xao về sự việc của&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang&nbsp;</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">v&agrave;&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Nam Em</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;Mọi việc xuất ph&aacute;t từ lời của&nbsp;<strong>Nam Em</strong>&nbsp;trong một b&agrave;i phỏng vấn.&nbsp;Theo đ&oacute;, c&ocirc; bất ngờ nhắc đến nam diễn vi&ecirc;n h&agrave;i trong chuyện t&igrave;nh cảm như sau: &ldquo;<em>T&ocirc;i l&agrave; người sống thật. Th&uacute; thật, anh Giang l&agrave; người cho t&ocirc;i c&oacute; c&aacute;i nh&igrave;n s&acirc;u sắc về cuộc sống v&agrave; cũng l&agrave; người l&agrave;m cho t&ocirc;i rất đau đớn. Chưa c&oacute; người đ&agrave;n &ocirc;ng n&agrave;o d&aacute;m phũ ph&agrave;ng với t&ocirc;i như vậy. Ai cũng c&oacute; một tr&aacute;i tim, nếu l&agrave; đ&agrave;n &ocirc;ng đừng bao giờ l&agrave;m phụ nữ tổn thương. Nh&acirc;n đ&acirc;y, t&ocirc;i cũng muốn gửi đến &ldquo;ai đ&oacute;&rdquo;, nếu &ldquo;ai đ&oacute;&rdquo; v&ocirc; t&igrave;nh đọc được th&igrave; xin đừng l&agrave;m người kh&aacute;c tổn thương&rdquo;.</em></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/Truong-giang-nha-phuong%204.jpg\" style=\"height:394px; width:699px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Thậm ch&iacute;, c&ocirc; c&ograve;n tiết lộ rằng cả hai đ&atilde; c&oacute; thời gian b&ecirc;n nhau trong l&uacute;c&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;vẫn c&ograve;n mối quan hệ t&igrave;nh cảm với</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;Nh&atilde; Phương</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Ng&agrave;y 15/1 l&agrave; sinh nhật c&ocirc;,&nbsp;<strong>Trường Giang</strong>&nbsp;c&oacute;&nbsp;tham dự v&agrave; ng&agrave;y 17/1&nbsp;lại cầu h&ocirc;n&nbsp;<strong>Nh&atilde; Phương</strong>&nbsp;tr&ecirc;n s&oacute;ng truyền h&igrave;nh.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Chẳng những thế,&nbsp;<strong>Nam Em</strong>&nbsp;c&ograve;n kh&aacute; buồn b&atilde; khi mọi người hỏi về mối quan hệ thực sự của c&ocirc; v&agrave;&nbsp;<strong>Trường Giang</strong>. C&ocirc; b&agrave;y tỏ:&nbsp;<em>&ldquo;Mọi người nghĩ sao th&igrave; l&agrave; như vậy. C&acirc;u hỏi thật sự khiến t&ocirc;i đau l&ograve;ng v&igrave; đang cố gắng qu&ecirc;n&hellip;&rdquo;.</em></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/5%20nam-em-noi-gi-truoc-nghi-van-lay-chuyen-tinh-cam-de-pr-6979889b.jpg\" style=\"height:1024px; width:682px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trước&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Nam Em</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;kh&ocirc;ng l&acirc;u,&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;lại vướng v&agrave;o nghi vấn hẹn h&ograve; với&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Sam</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">, khi cả hai c&ugrave;ng đ&oacute;ng chung dự &aacute;n điện ảnh v&agrave;o dịp Tết 2018. Tại thời điểm đ&oacute;,&nbsp;c&aacute;c bức ảnh th&acirc;n thiết của &ldquo;Mười kh&oacute;&rdquo; v&agrave; hot girl&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Sam</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;xuất hiện li&ecirc;n tục tr&ecirc;n khắp c&aacute;c diễn đ&agrave;n.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/6%20truonggiangblogtamsuvn8.jpg\" style=\"height:601px; width:505px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Ngay khi ấy, ph&iacute;a đại diện của&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;cũng đ&atilde; chia sẻ về sự việc đang g&acirc;y x&ocirc;n xao n&agrave;y.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;Theo đ&oacute;, người đại diện&nbsp;của nam danh h&agrave;i cho biết:&nbsp;<em>&ldquo;Mối quan hệ giữa Trường Giang v&agrave; Nh&atilde; Phương vẫn rất b&igrave;nh thường. Hiện tại cả hai đang c&oacute; lịch l&agrave;m việc kh&ocirc;ng tr&ugrave;ng nhau n&ecirc;n kh&ocirc;ng xuất hiện c&ugrave;ng nhau&rdquo;.</em></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:start\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Nữ diễn vi&ecirc;n bộc bạch:&nbsp;<em>&ldquo;Th&uacute; thật v&agrave;o thời điểm tin đồn vừa xuất hiện, t&ocirc;i cảm thấy rất hoang mang, ngạc nhi&ecirc;n v&igrave; kh&ocirc;ng hiểu m&igrave;nh đ&atilde; l&agrave;m g&igrave; sai để phải bị dư luận v&agrave; một số fan qu&aacute; kh&iacute;ch của anh Giang v&agrave; Nh&atilde; Phương n&eacute;m đ&aacute; như thế. Những ai đ&atilde; theo d&otilde;i t&ocirc;i từ trước, họ biết r&otilde; mỗi khi t&ocirc;i c&oacute; dự &aacute;n mới, t&ocirc;i lu&ocirc;n đăng ảnh chụp c&ugrave;ng bạn diễn nam để quảng b&aacute; cho c&aacute;c bộ phim của m&igrave;nh.</em></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/9%20nha-phuong-da-phai-hung-chiu-nhung-dieu-gi-ke-tu-khi-yeu-truong-giang-0f506835.jpg\" style=\"height:480px; width:640px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">T&ocirc;i từng hợp t&aacute;c v&agrave; đăng ảnh với rất nhiều diễn vi&ecirc;n, kể cả những người đ&atilde; c&oacute; vợ, nhưng kh&ocirc;ng hiểu sao đến lượt anh Trường Giang, tin đồn lại b&ugrave;ng nổ v&agrave; khiến dư luận phản ứng gay gắt đến thế.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">T&ocirc;i kh&ocirc;ng buồn v&igrave; bị kh&aacute;n giả chỉ tr&iacute;ch, nhưng buồn v&igrave; tin đồn n&agrave;y đ&atilde; ảnh hưởng kh&ocirc;ng nhỏ đến cuộc sống c&aacute; nh&acirc;n của nhiều người, c&oacute; cả mối quan hệ giữa anh Giang v&agrave; Nh&atilde; Phương&rdquo;.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Kh&ocirc;ng chỉ c&oacute;&nbsp;<strong>Nam Em</strong>,&nbsp;<strong>Sam</strong>&nbsp;m&agrave;&nbsp;<strong>Trường Giang</strong>&nbsp;c&ograve;n c&oacute; thời điểm &ldquo;g&acirc;y b&atilde;o&rdquo; tr&ecirc;n mạng x&atilde; hội v&igrave; chuyện t&igrave;nh cảm giữa anh v&agrave; nữ ca sĩ&nbsp;<strong>Quế V&acirc;n</strong>. Khi ấy,&nbsp;<strong>Quế V&acirc;n</strong>&nbsp;đăng tải một t&acirc;m thư kh&aacute; d&agrave;i tr&ecirc;n trang c&aacute; nh&acirc;n với nội dung khẳng định&nbsp;<strong>Trường Giang</strong>&nbsp;l&agrave; người lăng nhăng, kh&ocirc;ng xem c&ocirc; v&agrave; bạn b&egrave; xung quanh ra g&igrave;, khiến mọi người thất vọng.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/11%20nha-phuong-da-phai-hung-chiu-nhung-dieu-gi-ke-tu-khi-yeu-truong-giang-c9e351e1.jpg\" style=\"height:480px; width:492px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">H&agrave;ng loạt h&igrave;nh ảnh mặn nồng của&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Quế V&acirc;n</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;v&agrave;&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;được ch&iacute;nh nữ ca sĩ đăng đ&agrave;n.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:start\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Thậm ch&iacute;, h&agrave;ng loạt tin nhắn m&ugrave;i mẫn cũng do c&ocirc; c&ocirc;ng khai, nhằm khẳng định sự việc giữa c&ocirc; v&agrave;&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;v&agrave; c&oacute; thật.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:start\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Khi&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Nam Em</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;c&ocirc;ng khai mối quan hệ với&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Trường Giang</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">,&nbsp;</span></span></em><strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Quế V&acirc;n</span></span></em></strong><em><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">&nbsp;đ&atilde; lập tức nhắn nhủ đến &ldquo;người cũ&rdquo;: &ldquo;Đừng gieo nghiệp nữa Trường Giang ơi&hellip; Đến ph&uacute;t n&agrave;y t&ocirc;i thương em Nh&atilde; Phương rất nhiều&rdquo;.</span></span></em></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:start\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Tuy nhi&ecirc;n, vẫn c&ograve;n rất nhiều luồng &yacute; kiến cho rằng anh lăng nhăng. Cũng ch&iacute;nh v&igrave; những chuyện l&ugrave;m x&ugrave;m với c&aacute;c mỹ nh&acirc;n Việt m&agrave; h&igrave;nh ảnh của anh đ&atilde; bị ảnh hưởng v&agrave; mất điểm trầm trọng trong l&ograve;ng người h&acirc;m mộ.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:13.0pt\"><span style=\"color:#222222\">Theo:Yan</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', 'nhung-lum-xum-ve-chuyen-tinh-cam-cua-ban-trai-voi-nhung-nguoi-khac-la-dieu-ma-nha-phuong-phai-nghe-nhieu-nhat-ke-tu-khi-hen-ho-voi-truong-giang', 'vi', null, null, '1522391765', '3', '1', '1', 'Chuyền tình trường giang và nhã phương', 'Trường giang, nhã phương, nam em, quế vân', 'Những lùm xùm về chuyện tình cảm của bạn trai với những người khác là điều mà Nhã Phương phải nghe nhiều nhất kể từ khi hẹn hò với Trường Giang.', '', '5', '1', '0');
INSERT INTO `news` VALUES ('17', 'Ngoài hạnh phúc, đây là những điều mà Nhã Phương phải chịu đựng khi yêu Trường Giang phải đối mặt', '<p><strong>Trường Giang &ndash; Nh&atilde; Phương&nbsp;</strong>đang l&agrave; một trong những cặp đ&ocirc;i khiến kh&aacute;n giả mong ng&oacute;ng về &ldquo;chung nh&agrave;&rdquo; nhất showbiz. C&oacute; thời</p>\r\n', '1', 'upload/img/news/15-nha-phuong-da-phai-hung-chiu-nhung-dieu-gi-ke-tu-khi-yeu-truong-giang.jpg', '<p>Trường Giang &ndash; Nh&atilde; Phương&nbsp;đang l&agrave; một trong những cặp đ&ocirc;i khiến kh&aacute;n giả mong ng&oacute;ng về &ldquo;chung nh&agrave;&rdquo; nhất showbiz.&nbsp;</p>\r\n\r\n<p>Đặc biệt, v&agrave;o đầu năm 2018,&nbsp;Trường Giang&nbsp;đ&atilde; c&oacute; m&agrave;n cầu h&ocirc;n bạn g&aacute;i &ldquo;g&acirc;y b&atilde;o&rdquo; khắp c&aacute;c diễn đ&agrave;n.</p>\r\n\r\n<p>C&oacute; người ủng hộ nhưng cũng c&oacute; người phản đối. Sau sự việc ấy, rất nhiều tin đồn cho rằng cả hai đ&atilde; &ldquo;đường ai nấy đi&rdquo; khi c&oacute; nhiều điểm tr&ugrave;ng hợp ở họ như: kh&ocirc;ng xuất hiện c&ugrave;ng nhau,&nbsp;Nh&atilde; Phương&nbsp;kh&ocirc;ng đeo nhẫn,&hellip;</p>\r\n\r\n<p>Từ khi hẹn h&ograve; với&nbsp;Trường Giang,&nbsp;Nh&atilde; Phương&nbsp;li&ecirc;n tục xuất hiện tr&ecirc;n truyền th&ocirc;ng.</p>\r\n\r\n<p>Mỗi khi xuất hiện trước c&ocirc;ng ch&uacute;ng, họ lu&ocirc;n l&agrave;m mọi người ngưỡng mộ v&igrave; độ hạnh ph&uacute;c v&agrave; ngọt ng&agrave;o. Đặc biệt,&nbsp;Trường Giang&nbsp;thường d&ugrave;ng những lời &ldquo;c&oacute; c&aacute;nh&rdquo; khi n&oacute;i về bạn g&aacute;i. Ai cũng nghĩ rằng&nbsp;Nh&atilde; Phương&nbsp;l&agrave; c&ocirc; g&aacute;i may mắn v&igrave; c&oacute; được người y&ecirc;u nổi tiếng v&agrave; y&ecirc;u thương c&ocirc;. Tuy nhi&ecirc;n, kh&ocirc;ng chỉ hạnh ph&uacute;c, người đẹp c&ograve;n phải hứng chịu những điều kh&ocirc;ng hay, đặc biệt l&agrave; những tin đồn của&nbsp;Trường Giang&nbsp;v&agrave; c&aacute;c mỹ nh&acirc;n kh&aacute;c trong showbiz Việt.</p>\r\n\r\n<p>V&agrave;i ng&agrave;y qua, kh&aacute;n giả khắp nơi đang x&ocirc;n xao về sự việc của&nbsp;Trường Giang&nbsp;v&agrave;&nbsp;Nam Em.</p>\r\n\r\n<p>&nbsp;Mọi việc xuất ph&aacute;t từ lời của&nbsp;Nam Em&nbsp;trong một b&agrave;i phỏng vấn.&nbsp;Theo đ&oacute;, c&ocirc; bất ngờ nhắc đến nam diễn vi&ecirc;n h&agrave;i trong chuyện t&igrave;nh cảm như sau: &ldquo;T&ocirc;i l&agrave; người sống thật. Th&uacute; thật, anh Giang l&agrave; người cho t&ocirc;i c&oacute; c&aacute;i nh&igrave;n s&acirc;u sắc về cuộc sống v&agrave; cũng l&agrave; người l&agrave;m cho t&ocirc;i rất đau đớn. Chưa c&oacute; người đ&agrave;n &ocirc;ng n&agrave;o d&aacute;m phũ ph&agrave;ng với t&ocirc;i như vậy. Ai cũng c&oacute; một tr&aacute;i tim, nếu l&agrave; đ&agrave;n &ocirc;ng đừng bao giờ l&agrave;m phụ nữ tổn thương. Nh&acirc;n đ&acirc;y, t&ocirc;i cũng muốn gửi đến &ldquo;ai đ&oacute;&rdquo;, nếu &ldquo;ai đ&oacute;&rdquo; v&ocirc; t&igrave;nh đọc được th&igrave; xin đừng l&agrave;m người kh&aacute;c tổn thương&rdquo;.</p>\r\n\r\n<p>Thậm ch&iacute;, c&ocirc; c&ograve;n tiết lộ rằng cả hai đ&atilde; c&oacute; thời gian b&ecirc;n nhau trong l&uacute;c&nbsp;Trường Giang&nbsp;vẫn c&ograve;n mối quan hệ t&igrave;nh cảm với&nbsp;Nh&atilde; Phương.</p>\r\n\r\n<p>Ng&agrave;y 15/1 l&agrave; sinh nhật c&ocirc;,&nbsp;Trường Giang&nbsp;c&oacute;&nbsp;tham dự v&agrave; ng&agrave;y 17/1&nbsp;lại cầu h&ocirc;n&nbsp;Nh&atilde; Phương&nbsp;tr&ecirc;n s&oacute;ng truyền h&igrave;nh.</p>\r\n\r\n<p>Chẳng những thế,&nbsp;Nam Em&nbsp;c&ograve;n kh&aacute; buồn b&atilde; khi mọi người hỏi về mối quan hệ thực sự của c&ocirc; v&agrave;&nbsp;Trường Giang. C&ocirc; b&agrave;y tỏ:&nbsp;&ldquo;Mọi người nghĩ sao th&igrave; l&agrave; như vậy. C&acirc;u hỏi thật sự khiến t&ocirc;i đau l&ograve;ng v&igrave; đang cố gắng qu&ecirc;n&hellip;&rdquo;.</p>\r\n\r\n<p>Trước&nbsp;Nam Em&nbsp;kh&ocirc;ng l&acirc;u,&nbsp;Trường Giang&nbsp;lại vướng v&agrave;o nghi vấn hẹn h&ograve; với&nbsp;Sam, khi cả hai c&ugrave;ng đ&oacute;ng chung dự &aacute;n điện ảnh v&agrave;o dịp Tết 2018. Tại thời điểm đ&oacute;,&nbsp;c&aacute;c bức ảnh th&acirc;n thiết của &ldquo;Mười kh&oacute;&rdquo; v&agrave; hot girl&nbsp;Sam&nbsp;xuất hiện li&ecirc;n tục tr&ecirc;n khắp c&aacute;c diễn đ&agrave;n.</p>\r\n\r\n<p>Ngay khi ấy, ph&iacute;a đại diện của&nbsp;Trường Giang&nbsp;cũng đ&atilde; chia sẻ về sự việc đang g&acirc;y x&ocirc;n xao n&agrave;y.</p>\r\n\r\n<p>&nbsp;Theo đ&oacute;, người đại diện&nbsp;của nam danh h&agrave;i cho biết:&nbsp;&ldquo;Mối quan hệ giữa Trường Giang v&agrave; Nh&atilde; Phương vẫn rất b&igrave;nh thường. Hiện tại cả hai đang c&oacute; lịch l&agrave;m việc kh&ocirc;ng tr&ugrave;ng nhau n&ecirc;n kh&ocirc;ng xuất hiện c&ugrave;ng nhau&rdquo;.</p>\r\n\r\n<p>Nữ diễn vi&ecirc;n bộc bạch:&nbsp;&ldquo;Th&uacute; thật v&agrave;o thời điểm tin đồn vừa xuất hiện, t&ocirc;i cảm thấy rất hoang mang, ngạc nhi&ecirc;n v&igrave; kh&ocirc;ng hiểu m&igrave;nh đ&atilde; l&agrave;m g&igrave; sai để phải bị dư luận v&agrave; một số fan qu&aacute; kh&iacute;ch của anh Giang v&agrave; Nh&atilde; Phương n&eacute;m đ&aacute; như thế. Những ai đ&atilde; theo d&otilde;i t&ocirc;i từ trước, họ biết r&otilde; mỗi khi t&ocirc;i c&oacute; dự &aacute;n mới, t&ocirc;i lu&ocirc;n đăng ảnh chụp c&ugrave;ng bạn diễn nam để quảng b&aacute; cho c&aacute;c bộ phim của m&igrave;nh.</p>\r\n\r\n<p>T&ocirc;i từng hợp t&aacute;c v&agrave; đăng ảnh với rất nhiều diễn vi&ecirc;n, kể cả những người đ&atilde; c&oacute; vợ, nhưng kh&ocirc;ng hiểu sao đến lượt anh Trường Giang, tin đồn lại b&ugrave;ng nổ v&agrave; khiến dư luận phản ứng gay gắt đến thế.</p>\r\n\r\n<p>T&ocirc;i kh&ocirc;ng buồn v&igrave; bị kh&aacute;n giả chỉ tr&iacute;ch, nhưng buồn v&igrave; tin đồn n&agrave;y đ&atilde; ảnh hưởng kh&ocirc;ng nhỏ đến cuộc sống c&aacute; nh&acirc;n của nhiều người, c&oacute; cả mối quan hệ giữa anh Giang v&agrave; Nh&atilde; Phương&rdquo;.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ c&oacute;&nbsp;Nam Em,&nbsp;Sam&nbsp;m&agrave;&nbsp;Trường Giang&nbsp;c&ograve;n c&oacute; thời điểm &ldquo;g&acirc;y b&atilde;o&rdquo; tr&ecirc;n mạng x&atilde; hội v&igrave; chuyện t&igrave;nh cảm giữa anh v&agrave; nữ ca sĩ&nbsp;Quế V&acirc;n. Khi ấy,&nbsp;Quế V&acirc;n&nbsp;đăng tải một t&acirc;m thư kh&aacute; d&agrave;i tr&ecirc;n trang c&aacute; nh&acirc;n với nội dung khẳng định&nbsp;Trường Giang&nbsp;l&agrave; người lăng nhăng, kh&ocirc;ng xem c&ocirc; v&agrave; bạn b&egrave; xung quanh ra g&igrave;, khiến mọi người thất vọng.</p>\r\n\r\n<p>H&agrave;ng loạt h&igrave;nh ảnh mặn nồng của&nbsp;Quế V&acirc;n&nbsp;v&agrave;&nbsp;Trường Giang&nbsp;được ch&iacute;nh nữ ca sĩ đăng đ&agrave;n.</p>\r\n\r\n<p>Thậm ch&iacute;, h&agrave;ng loạt tin nhắn m&ugrave;i mẫn cũng do c&ocirc; c&ocirc;ng khai, nhằm khẳng định sự việc giữa c&ocirc; v&agrave;&nbsp;Trường Giang&nbsp;v&agrave; c&oacute; thật.</p>\r\n\r\n<p>Khi&nbsp;Nam Em&nbsp;c&ocirc;ng khai mối quan hệ với&nbsp;Trường Giang,&nbsp;Quế V&acirc;n&nbsp;đ&atilde; lập tức nhắn nhủ đến &ldquo;người cũ&rdquo;: &ldquo;Đừng gieo nghiệp nữa Trường Giang ơi&hellip; Đến ph&uacute;t n&agrave;y t&ocirc;i thương em Nh&atilde; Phương rất nhiều&rdquo;.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, vẫn c&ograve;n rất nhiều luồng &yacute; kiến cho rằng anh lăng nhăng. Cũng ch&iacute;nh v&igrave; những chuyện l&ugrave;m x&ugrave;m với c&aacute;c mỹ nh&acirc;n Việt m&agrave; h&igrave;nh ảnh của anh đ&atilde; bị ảnh hưởng v&agrave; mất điểm trầm trọng trong l&ograve;ng người h&acirc;m mộ.</p>\r\n\r\n<p>Theo:Yan</p>\r\n', 'ngoai-hanh-phuc-day-la-nhung-dieu-ma-nha-phuong-phai-chiu-dung-khi-yeu-truong-giang-phai-doi-mat', 'vi', null, null, '1522386934', '3', '1', '1', '', '', '', '', '7', '1', '0');
INSERT INTO `news` VALUES ('18', 'Vài ngày qua, khán giả khắp nơi đang xôn xao về sự việc của Trường Giang và Nam Em', '<p><strong>Trường Giang &ndash; Nh&atilde; Phương&nbsp;</strong>đang l&agrave; một trong những cặp đ&ocirc;i khiến kh&aacute;n giả mong ng&oacute;ng về &ldquo;chung nh&agrave;&rdquo; nhất showbiz.&nbsp;</p>\r\n', '1', 'upload/img/news/truong-giang-nha-phuong-4.jpg', '<p>Đặc biệt, v&agrave;o đầu năm 2018,&nbsp;Trường Giang&nbsp;đ&atilde; c&oacute; m&agrave;n cầu h&ocirc;n bạn g&aacute;i &ldquo;g&acirc;y b&atilde;o&rdquo; khắp c&aacute;c diễn đ&agrave;n.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/upload/images/Truong-giang-nha-phuong%203(2).jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">C&oacute; người ủng hộ nhưng cũng c&oacute; người phản đối. Sau sự việc ấy, rất nhiều tin đồn cho rằng cả hai đ&atilde; &ldquo;đường ai nấy đi&rdquo; khi c&oacute; nhiều điểm tr&ugrave;ng hợp ở họ như: kh&ocirc;ng xuất hiện c&ugrave;ng nhau,&nbsp;Nh&atilde; Phương&nbsp;kh&ocirc;ng đeo nhẫn,&hellip;</p>\r\n\r\n<p>Từ khi hẹn h&ograve; với&nbsp;Trường Giang,&nbsp;Nh&atilde; Phương&nbsp;li&ecirc;n tục xuất hiện tr&ecirc;n truyền th&ocirc;ng.</p>\r\n\r\n<p>Mỗi khi xuất hiện trước c&ocirc;ng ch&uacute;ng, họ lu&ocirc;n l&agrave;m mọi người ngưỡng mộ v&igrave; độ hạnh ph&uacute;c v&agrave; ngọt ng&agrave;o. Đặc biệt,&nbsp;Trường Giang&nbsp;thường d&ugrave;ng những lời &ldquo;c&oacute; c&aacute;nh&rdquo; khi n&oacute;i về bạn g&aacute;i. Ai cũng nghĩ rằng&nbsp;Nh&atilde; Phương&nbsp;l&agrave; c&ocirc; g&aacute;i may mắn v&igrave; c&oacute; được người y&ecirc;u nổi tiếng v&agrave; y&ecirc;u thương c&ocirc;. Tuy nhi&ecirc;n, kh&ocirc;ng chỉ hạnh ph&uacute;c, người đẹp c&ograve;n phải hứng chịu những điều kh&ocirc;ng hay, đặc biệt l&agrave; những tin đồn của&nbsp;Trường Giang&nbsp;v&agrave; c&aacute;c mỹ nh&acirc;n kh&aacute;c trong showbiz Việt.</p>\r\n\r\n<p>V&agrave;i ng&agrave;y qua, kh&aacute;n giả khắp nơi đang x&ocirc;n xao về sự việc của&nbsp;Trường Giang&nbsp;v&agrave;&nbsp;Nam Em.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/upload/images/Truong-giang-nha-phuong%204(1).jpg\" /></p>\r\n\r\n<p>&nbsp;Mọi việc xuất ph&aacute;t từ lời của&nbsp;Nam Em&nbsp;trong một b&agrave;i phỏng vấn.&nbsp;Theo đ&oacute;, c&ocirc; bất ngờ nhắc đến nam diễn vi&ecirc;n h&agrave;i trong chuyện t&igrave;nh cảm như sau: &ldquo;T&ocirc;i l&agrave; người sống thật. Th&uacute; thật, anh Giang l&agrave; người cho t&ocirc;i c&oacute; c&aacute;i nh&igrave;n s&acirc;u sắc về cuộc sống v&agrave; cũng l&agrave; người l&agrave;m cho t&ocirc;i rất đau đớn. Chưa c&oacute; người đ&agrave;n &ocirc;ng n&agrave;o d&aacute;m phũ ph&agrave;ng với t&ocirc;i như vậy. Ai cũng c&oacute; một tr&aacute;i tim, nếu l&agrave; đ&agrave;n &ocirc;ng đừng bao giờ l&agrave;m phụ nữ tổn thương. Nh&acirc;n đ&acirc;y, t&ocirc;i cũng muốn gửi đến &ldquo;ai đ&oacute;&rdquo;, nếu &ldquo;ai đ&oacute;&rdquo; v&ocirc; t&igrave;nh đọc được th&igrave; xin đừng l&agrave;m người kh&aacute;c tổn thương&rdquo;.</p>\r\n\r\n<p>Thậm ch&iacute;, c&ocirc; c&ograve;n tiết lộ rằng cả hai đ&atilde; c&oacute; thời gian b&ecirc;n nhau trong l&uacute;c&nbsp;Trường Giang&nbsp;vẫn c&ograve;n mối quan hệ t&igrave;nh cảm với&nbsp;Nh&atilde; Phương.</p>\r\n\r\n<p>Ng&agrave;y 15/1 l&agrave; sinh nhật c&ocirc;,&nbsp;Trường Giang&nbsp;c&oacute;&nbsp;tham dự v&agrave; ng&agrave;y 17/1&nbsp;lại cầu h&ocirc;n&nbsp;Nh&atilde; Phương&nbsp;tr&ecirc;n s&oacute;ng truyền h&igrave;nh.</p>\r\n\r\n<p>Chẳng những thế,&nbsp;Nam Em&nbsp;c&ograve;n kh&aacute; buồn b&atilde; khi mọi người hỏi về mối quan hệ thực sự của c&ocirc; v&agrave;&nbsp;Trường Giang. C&ocirc; b&agrave;y tỏ:&nbsp;&ldquo;Mọi người nghĩ sao th&igrave; l&agrave; như vậy. C&acirc;u hỏi thật sự khiến t&ocirc;i đau l&ograve;ng v&igrave; đang cố gắng qu&ecirc;n&hellip;&rdquo;.</p>\r\n\r\n<p>Trước&nbsp;Nam Em&nbsp;kh&ocirc;ng l&acirc;u,&nbsp;Trường Giang&nbsp;lại vướng v&agrave;o nghi vấn hẹn h&ograve; với&nbsp;Sam, khi cả hai c&ugrave;ng đ&oacute;ng chung dự &aacute;n điện ảnh v&agrave;o dịp Tết 2018. Tại thời điểm đ&oacute;,&nbsp;c&aacute;c bức ảnh th&acirc;n thiết của &ldquo;Mười kh&oacute;&rdquo; v&agrave; hot girl&nbsp;Sam&nbsp;xuất hiện li&ecirc;n tục tr&ecirc;n khắp c&aacute;c diễn đ&agrave;n.</p>\r\n\r\n<p>Ngay khi ấy, ph&iacute;a đại diện của&nbsp;Trường Giang&nbsp;cũng đ&atilde; chia sẻ về sự việc đang g&acirc;y x&ocirc;n xao n&agrave;y.</p>\r\n\r\n<p>&nbsp;Theo đ&oacute;, người đại diện&nbsp;của nam danh h&agrave;i cho biết:&nbsp;&ldquo;Mối quan hệ giữa Trường Giang v&agrave; Nh&atilde; Phương vẫn rất b&igrave;nh thường. Hiện tại cả hai đang c&oacute; lịch l&agrave;m việc kh&ocirc;ng tr&ugrave;ng nhau n&ecirc;n kh&ocirc;ng xuất hiện c&ugrave;ng nhau&rdquo;.</p>\r\n\r\n<p>Nữ diễn vi&ecirc;n bộc bạch:&nbsp;&ldquo;Th&uacute; thật v&agrave;o thời điểm tin đồn vừa xuất hiện, t&ocirc;i cảm thấy rất hoang mang, ngạc nhi&ecirc;n v&igrave; kh&ocirc;ng hiểu m&igrave;nh đ&atilde; l&agrave;m g&igrave; sai để phải bị dư luận v&agrave; một số fan qu&aacute; kh&iacute;ch của anh Giang v&agrave; Nh&atilde; Phương n&eacute;m đ&aacute; như thế. Những ai đ&atilde; theo d&otilde;i t&ocirc;i từ trước, họ biết r&otilde; mỗi khi t&ocirc;i c&oacute; dự &aacute;n mới, t&ocirc;i lu&ocirc;n đăng ảnh chụp c&ugrave;ng bạn diễn nam để quảng b&aacute; cho c&aacute;c bộ phim của m&igrave;nh.</p>\r\n\r\n<p>T&ocirc;i từng hợp t&aacute;c v&agrave; đăng ảnh với rất nhiều diễn vi&ecirc;n, kể cả những người đ&atilde; c&oacute; vợ, nhưng kh&ocirc;ng hiểu sao đến lượt anh Trường Giang, tin đồn lại b&ugrave;ng nổ v&agrave; khiến dư luận phản ứng gay gắt đến thế.</p>\r\n\r\n<p>T&ocirc;i kh&ocirc;ng buồn v&igrave; bị kh&aacute;n giả chỉ tr&iacute;ch, nhưng buồn v&igrave; tin đồn n&agrave;y đ&atilde; ảnh hưởng kh&ocirc;ng nhỏ đến cuộc sống c&aacute; nh&acirc;n của nhiều người, c&oacute; cả mối quan hệ giữa anh Giang v&agrave; Nh&atilde; Phương&rdquo;.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ c&oacute;&nbsp;Nam Em,&nbsp;Sam&nbsp;m&agrave;&nbsp;Trường Giang&nbsp;c&ograve;n c&oacute; thời điểm &ldquo;g&acirc;y b&atilde;o&rdquo; tr&ecirc;n mạng x&atilde; hội v&igrave; chuyện t&igrave;nh cảm giữa anh v&agrave; nữ ca sĩ&nbsp;Quế V&acirc;n. Khi ấy,&nbsp;Quế V&acirc;n&nbsp;đăng tải một t&acirc;m thư kh&aacute; d&agrave;i tr&ecirc;n trang c&aacute; nh&acirc;n với nội dung khẳng định&nbsp;Trường Giang&nbsp;l&agrave; người lăng nhăng, kh&ocirc;ng xem c&ocirc; v&agrave; bạn b&egrave; xung quanh ra g&igrave;, khiến mọi người thất vọng.</p>\r\n\r\n<p>H&agrave;ng loạt h&igrave;nh ảnh mặn nồng của&nbsp;Quế V&acirc;n&nbsp;v&agrave;&nbsp;Trường Giang&nbsp;được ch&iacute;nh nữ ca sĩ đăng đ&agrave;n.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/upload/images/11%20nha-phuong-da-phai-hung-chiu-nhung-dieu-gi-ke-tu-khi-yeu-truong-giang-c9e351e1(1).jpg\" /></p>\r\n\r\n<p>Thậm ch&iacute;, h&agrave;ng loạt tin nhắn m&ugrave;i mẫn cũng do c&ocirc; c&ocirc;ng khai, nhằm khẳng định sự việc giữa c&ocirc; v&agrave;&nbsp;Trường Giang&nbsp;v&agrave; c&oacute; thật.</p>\r\n\r\n<p>Khi&nbsp;Nam Em&nbsp;c&ocirc;ng khai mối quan hệ với&nbsp;Trường Giang,&nbsp;Quế V&acirc;n&nbsp;đ&atilde; lập tức nhắn nhủ đến &ldquo;người cũ&rdquo;: &ldquo;Đừng gieo nghiệp nữa Trường Giang ơi&hellip; Đến ph&uacute;t n&agrave;y t&ocirc;i thương em Nh&atilde; Phương rất nhiều&rdquo;.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, vẫn c&ograve;n rất nhiều luồng &yacute; kiến cho rằng anh lăng nhăng. Cũng ch&iacute;nh v&igrave; những chuyện l&ugrave;m x&ugrave;m với c&aacute;c mỹ nh&acirc;n Việt m&agrave; h&igrave;nh ảnh của anh đ&atilde; bị ảnh hưởng v&agrave; mất điểm trầm trọng trong l&ograve;ng người h&acirc;m mộ.</p>\r\n\r\n<p><strong>Theo:Yan</strong></p>\r\n', 'nhung-ngay-qua-khan-gia-khap-noi-dang-xon-xao-ve-su-viec-cua-truong-giang-va-nam-em', 'vi', null, null, '1522813812', '3', '1', '1', '', '', '', '', '8', '1', '0');
INSERT INTO `news` VALUES ('19', 'Thái độ của Hương Giang khi thấy Kim Lý - Hồ Ngọc Hà \"tay đan tay\" vô cùng tình tứ?', '<p>Hương Giang đăng tải đoạn trạng th&aacute;i v&ocirc; c&ugrave;ng h&agrave;i hước khi thấy Hồ Ngọc H&agrave; v&agrave; Kim L&yacute; t&igrave;nh cảm trong sự kiện.</p>\r\n', '1', 'upload/img/news/phan-ung-cua-huong-giang-khi-thay-kim-ly-ho-ngoc-ha-tinh-tu-the-nay-huong-giang-hai-huoc-khi-ghen-ti-voi-hanh-phuc-cua-1522285189-129-width700height530.jpg', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\">Một sự kiện diễn ra tại Đ&agrave; Nẵng đ&atilde; thu h&uacute;t được rất nhiều sự quan t&acirc;m của truyền th&ocirc;ng khi c&oacute; sự g&oacute;p mặt của rất nhiều t&ecirc;n tuổi hot hiện nay như: Hoa hậu Hương Giang, Hồ Ngọc H&agrave;, Kim L&yacute;, Mỹ T&acirc;m, Trấn Th&agrave;nh...</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\">Mới đ&acirc;y, sau khi kết th&uacute;c sự kiện được 1 ng&agrave;y, T&acirc;n Hoa hậu Chuyển giới Hương Giang vừa chia sẻ lại một khoảnh khắc &quot;t&igrave;nh bể b&igrave;nh&quot; của Hồ Ngọc H&agrave; v&agrave; Kim L&yacute; k&egrave;m theo đ&oacute; l&agrave; đoạn trạng th&aacute;i v&ocirc; c&ugrave;ng h&agrave;i hước: &quot;Rồi chắc chắn Giang sẽ hạnh ph&uacute;c Giang ơi, Giang đừng lo... Kh&ocirc;ng ai đan tay m&igrave;nh tự đan tay m&igrave;nh để thấy m&igrave;nh kh&ocirc;ng lạc l&otilde;ng. Khi anh &yacute; lấy &aacute;o kho&aacute;c cho chị H&agrave;, c&ocirc; b&eacute; run rẩy đ&atilde; c&oacute; được &aacute;o của anh L&yacute; Qu&iacute; Kh&aacute;nh&quot;, Hương Giang t&acirc;m sự.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/phan-ung-cua-huong-giang-khi-thay-kim-ly---ho-ngoc-ha-tinh-tu-the-nay-huong-giang-hai-huoc-khi-ghen-ti-voi-hanh-phuc-cua-1522285189-129-width700height530.jpg\" style=\"height:530px; width:700px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><em><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\">H&igrave;nh ảnh Hương Giang ngồi một m&igrave;nh b&ecirc;n cạnh Hồ Ngọc H&agrave; v&agrave; Kim L&yacute; đang tay trong tay.</span></span></span></em></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\">Đ&acirc;y l&agrave; lần xuất hiện đầu ti&ecirc;n của c&ocirc; trong ng&agrave;y trở về nước. Sau khi kết th&uacute;c chuỗi h&agrave;nh tr&igrave;nh đầu ti&ecirc;n với cương vị T&acirc;n Hoa hậu Chuyển giới 2018, c&ocirc; về Việt Nam để thực hiện tiếp những dự &aacute;n mới.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\">Trước đ&oacute;, Hương Giang c&ugrave;ng ngồi b&agrave;n ăn với Hồ Ngọc H&agrave;, Kim L&yacute;, Trấn Th&agrave;nh v&agrave; L&yacute; Qu&iacute; Kh&aacute;nh. Họ đ&atilde; c&oacute; khoảng thời gian tuyệt vời tại Đ&agrave; Nẵng sau những ng&agrave;y l&agrave;m việc căng thẳng. Đ&acirc;y c&oacute; lẽ l&agrave; lần hội ngộ hiếm hoi của những t&ecirc;n tuổi đ&igrave;nh đ&aacute;m n&agrave;y trong l&agrave;ng giải tr&iacute; Việt. </span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\">&quot;T&igrave;nh cờ gặp nhau giữa một kh&ocirc;ng gian qu&aacute; đẹp, tận hưởng nhưng gi&acirc;y ph&uacute;t tuyệt vời như thế n&agrave;y trong ng&agrave;y đầu ti&ecirc;n quay lại Việt Nam&quot;, Hương Giang b&agrave;y tỏ.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><img alt=\"\" src=\"/upload/images/2%20hoa-hau-huong-giang-bat-ngo-ve-nuoc-hoi-ngo-cung-ho-ngoc-ha-va-tran-thanh-z-1522198203-116-width660height440.jpg\" style=\"height:440px; width:660px\" /></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><em><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\">H&igrave;nh ảnh Hương Giang c&ugrave;ng c&aacute;c nghệ sĩ Việt trong sự kiện.</span></span></span></em></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><em><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\"><img alt=\"\" src=\"/upload/images/3%20hoa-hau-huong-giang-ve-nuoc-ngay-dau-tien-hoi-ngo-cung-ho-ngoc-ha-va-tran-thanh-1-1522199023-802-width660height440.jpg\" style=\"height:440px; width:660px\" /></span></span></span></em></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.0pt\">Hoa hậu Hương Giang c&ugrave;ng cặp đ&ocirc;i Hồ Ngọc H&agrave; - Kim L&yacute; v&agrave; NTK L&yacute; Qu&iacute; Kh&aacute;nh.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', 'thai-do-cua-huong-giang-khi-thay-kim-ly-ho-ngoc-ha-tay-dan-tay-vo-cung-tinh-tu', 'vi', null, null, '1522392463', '3', '1', '1', '', '', '', '', '11', '1', '0');

-- ----------------------------
-- Table structure for news_category
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `home` int(11) DEFAULT NULL,
  `focus` int(11) DEFAULT NULL,
  `hot` int(11) DEFAULT NULL,
  `coupon` int(11) DEFAULT NULL,
  `time_update` int(11) DEFAULT NULL,
  `time_start` int(8) DEFAULT NULL,
  `sort` int(5) DEFAULT '1',
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT '1',
  `title_seo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8_unicode_ci,
  `description_seo` text COLLATE utf8_unicode_ci,
  `button_view_left` int(11) NOT NULL,
  `button_view_right` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of news_category
-- ----------------------------
INSERT INTO `news_category` VALUES ('3', 'Tin tức - sự kiện', 'tin-tuc-su-kien', '', null, '0', '1', null, null, null, null, null, '3', 'vi', '', null, '', '1', '1');

-- ----------------------------
-- Table structure for news_to_category
-- ----------------------------
DROP TABLE IF EXISTS `news_to_category`;
CREATE TABLE `news_to_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of news_to_category
-- ----------------------------
INSERT INTO `news_to_category` VALUES ('22', '9', '3');
INSERT INTO `news_to_category` VALUES ('23', '10', '3');
INSERT INTO `news_to_category` VALUES ('24', '11', '3');
INSERT INTO `news_to_category` VALUES ('25', '12', '3');
INSERT INTO `news_to_category` VALUES ('26', '13', '3');
INSERT INTO `news_to_category` VALUES ('28', '14', '3');
INSERT INTO `news_to_category` VALUES ('29', '15', '3');
INSERT INTO `news_to_category` VALUES ('34', '16', '3');
INSERT INTO `news_to_category` VALUES ('33', '17', '3');
INSERT INTO `news_to_category` VALUES ('37', '18', '3');
INSERT INTO `news_to_category` VALUES ('36', '19', '3');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `note` text CHARACTER SET utf8,
  `item_order` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `show` tinyint(1) DEFAULT '0',
  `mark` tinyint(1) DEFAULT '0',
  `admin_note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `province` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `ward` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` decimal(21,0) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `view` tinyint(1) DEFAULT '1',
  `code` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `address2` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `startplaces` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `finishplace` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `fax` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  `startime` char(30) CHARACTER SET utf8 DEFAULT NULL,
  `endtime` char(30) CHARACTER SET utf8 DEFAULT NULL,
  `home` tinyint(1) DEFAULT NULL,
  `other_note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `code_sale` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `price_sale` int(10) DEFAULT NULL,
  `approved` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `price_ship` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('14', 'Thẩm Hải Văn', '42 lê quang đạo', '0986839102', 'thamhaivan@gmail.com', ' test đơn hàng', null, '1523602163', '0', '0', null, null, null, null, null, '1', '1', 'DH_1314', '', 'Thanh toán tiền mặt khi nhận hàng.', null, '', null, null, null, null, null, null, '0', null, null, '0', '0', '209');
INSERT INTO `order` VALUES ('13', 'nguyendai dinh', '42 Le Quang Dao, Nam Tu Liem, Ha Noi', '0986839102', 'daibkz@gmail.com', 'agdasgdsagdsagdsag', null, '1523592706', '0', '0', null, null, null, null, null, '1', '1', 'DH_1313', 'gdsagdsagdasgd', 'Thanh toán tiền mặt khi nhận hàng.', null, '', null, null, null, null, null, null, '0', null, null, '0', '0', '208');

-- ----------------------------
-- Table structure for order_item
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` int(50) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `t_option` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `initierary` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_start` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tour_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `person` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_end` char(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `pro_dir` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `alias` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of order_item
-- ----------------------------
INSERT INTO `order_item` VALUES ('1', '2', '5', '2', '123456', null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `order_item` VALUES ('2', '3', '5', '2', '0', null, null, null, null, null, null, null, null, '246912', null, 'sản phâm mới  của tôi', '123456', 'san-pham-moi-cua-toi', 'detail-copy-3.png');
INSERT INTO `order_item` VALUES ('3', '3', '4', '1', '0', null, null, null, null, null, null, null, null, '1234566', null, 'Quần áo bảo hộ kaky màu xanh dương', '1234566', 'quan-ao-bao-ho-kaky-mau-xanh-duong', 'quan-ao-kaky-mau-xanh-duong.png');
INSERT INTO `order_item` VALUES ('4', '5', '5', '2', '0', null, null, null, null, null, null, null, null, '246912', '10092017', 'sản phâm mới  của tôi', '123456', 'san-pham-moi-cua-toi', 'detail-copy-3.png');
INSERT INTO `order_item` VALUES ('5', '5', '4', '1', '0', null, null, null, null, null, null, null, null, '1234566', '10092017', 'Quần áo bảo hộ kaky màu xanh dương', '1234566', 'quan-ao-bao-ho-kaky-mau-xanh-duong', 'quan-ao-kaky-mau-xanh-duong.png');
INSERT INTO `order_item` VALUES ('6', '6', '5', '1', '0', null, null, null, null, null, null, null, null, '123456', '10092017', 'sản phâm mới  của tôi', '123456', 'san-pham-moi-cua-toi', 'detail-copy-3.png');
INSERT INTO `order_item` VALUES ('7', '7', '4', '3', '1500000', null, null, null, null, null, null, null, null, '3703698', '10092017', 'Quần áo bảo hộ kaky màu xanh dương', '1234566', 'quan-ao-bao-ho-kaky-mau-xanh-duong', 'quan-ao-kaky-mau-xanh-duong.png');
INSERT INTO `order_item` VALUES ('8', '7', '3', '1', '1234567', null, null, null, null, null, null, null, null, '1234222', '10092017', 'QUẦN ÁO KAKI MÀU GHI', '1234222', 'quan-ao-kaki-mau-ghi', 'quan-ao-kaky-mau-xanh-duong1.png');
INSERT INTO `order_item` VALUES ('9', '8', '6', '1', '0', null, null, null, null, null, null, null, null, '0', '10092017', 'áo chất lượng khi thi công công trình', '0', 'ao-chat-luong-khi-thi-cong-cong-trinh', 'news2.png');
INSERT INTO `order_item` VALUES ('10', '8', '4', '3', '1500000', null, null, null, null, null, null, null, null, '3703698', '10092017', 'Quần áo bảo hộ kaky màu xanh dương', '1234566', 'quan-ao-bao-ho-kaky-mau-xanh-duong', 'quan-ao-kaky-mau-xanh-duong.png');
INSERT INTO `order_item` VALUES ('11', '9', '28', '4', '0', null, null, null, null, null, null, null, null, '120000', '30112017', 'Khoai lang', '30000', 'khoai-lang', '1458811020-khoai-lang-2.jpg');
INSERT INTO `order_item` VALUES ('12', '9', '30', '1', '0', null, null, null, null, null, null, null, null, '20000', '30112017', 'Quả măng cụt', '20000', 'qua-mang-cut', 'mang-cut.jpg');
INSERT INTO `order_item` VALUES ('17', '14', '185', '5', '650000', null, null, null, null, null, null, null, null, '2000000', '30032018', 'Áo Len L06', '400000', 'ao-len-l06', 'ao-len-6.jpg');
INSERT INTO `order_item` VALUES ('16', '13', '186', '2', '550000', null, null, null, null, null, null, null, null, '900000', '30032018', 'Áo Len L07', '450000', 'ao-len-l07', 'ao-len-7.jpg');

-- ----------------------------
-- Table structure for places
-- ----------------------------
DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of places
-- ----------------------------
INSERT INTO `places` VALUES ('3', 'Osaka', '', null);
INSERT INTO `places` VALUES ('2', 'Tokyo', '', null);
INSERT INTO `places` VALUES ('4', 'Kanazawa', '', null);
INSERT INTO `places` VALUES ('5', 'Shirakawa-go', '', null);
INSERT INTO `places` VALUES ('6', 'Nagano', '', null);
INSERT INTO `places` VALUES ('7', 'Kobe', '', null);
INSERT INTO `places` VALUES ('8', 'Hakuba', '', null);

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `style` int(11) DEFAULT NULL,
  `id_value` int(11) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  `home` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `coupon` tinyint(1) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `description_seo` text COLLATE utf8_unicode_ci,
  `location` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  `like` int(11) DEFAULT '0',
  `order` decimal(21,0) DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `caption_1` text COLLATE utf8_unicode_ci,
  `caption_2` text COLLATE utf8_unicode_ci,
  `locale` int(11) DEFAULT NULL,
  `bought` int(11) DEFAULT '0',
  `dksudung` text COLLATE utf8_unicode_ci,
  `sort` int(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `counter` int(11) DEFAULT '0',
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT 'vi',
  `destination` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(8) DEFAULT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `pro_dir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `multi_image` text COLLATE utf8_unicode_ci,
  `img_dir` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `quaranty` tinyint(3) DEFAULT NULL,
  `tinhtrang` tinyint(1) DEFAULT NULL,
  `group_attribute_id` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `button_color1` int(11) NOT NULL,
  `config_pro` text COLLATE utf8_unicode_ci NOT NULL,
  `config_pro_content` text COLLATE utf8_unicode_ci NOT NULL,
  `price_imp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('141', null, null, null, 'Quần sooc nữ-B2821', 'HH141', 'quan-sooc-nu-b2821', 'quan-sooc-nu-b2821.jpg', '1', '1', '0', null, '3', '1', '260000', '160000', '', '', null, '', '', null, null, '0', '0', '41', null, null, null, null, null, '79', '0', null, 'vi', null, '1522314367', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('142', null, null, null, 'Quần yếm Jeans-B5823', 'HH142', 'quan-yem-jeans-b5823', 'quan-yem-jeans-b5823.jpg', '1', '1', '0', null, null, '1', '280000', '190000', '', '', null, '', '', null, null, '0', '0', '46', null, null, null, null, null, '80', '0', null, 'vi', null, '1522314936', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('143', null, null, null, 'Quần yếm Jeans-B5823', 'HH143', 'quan-yem-jeans-b5823', 'quan-yem-jeans-b58231.jpg', '1', '1', '0', null, '4', '1', '280000', '190000', '', '', null, '', '', null, null, '0', '0', '46', null, null, null, null, null, '81', '0', null, 'vi', null, '1522314936', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('144', null, null, null, 'Váy yếm jeans đẹp- B9291', 'HH144', 'vay-yem-jeans-dep-b9291', 'vay-yem-jeans-dep-b9291.jpg', '1', '1', '0', null, '4', '1', '260000', '190000', '', '', null, '', '', null, null, '0', '0', '46', null, null, null, null, null, '82', '0', null, 'vi', null, '1522315046', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('145', null, null, null, 'Váy yếm jeans đẹp- B9291', 'HH145', 'vay-yem-jeans-dep-b9291-22323', 'vay-yem-jeans-cao-cap-b9291.jpg', '1', '1', '0', null, '4', '1', '250000', '195000', '', '', null, '', '', null, null, '0', '0', '46', null, null, null, null, null, '83', '0', null, 'vi', null, '1522315138', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('146', null, null, null, 'Sexy Bralette ren cá tính', 'HH146', 'sexy-bralette-ren-ca-tinh', '01.jpg', '1', '1', '1', null, '11', '1', '250000', '145000', '<p>Thiết kế trẻ trung, dễ phối với nhiều kiểu trang phục ngo&agrave;i đầy c&aacute; t&iacute;nh, kh&ocirc;ng lộ ti - &Aacute;o ngực kh&ocirc;ng gọng, kh&ocirc;ng m&uacute;t hỗ trợ định h&igrave;nh bầu ngực - Ch&acirc;t liệu ren nhẹ nh&agrave;ng, tho&aacute;ng m&aacute;t - M&agrave;u sắc&nbsp;</p>\r\n', '', null, '', '', null, null, '0', '0', '53', null, null, null, null, null, '84', '0', null, 'vi', null, '1522468156', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p>hi\\u1ebft k\\u1ebf tr\\u1ebb trung, d\\u1ec5 ph\\u1ed1i v\\u1edbi nhi\\u1ec1u ki\\u1ec3u trang ph\\u1ee5c ngo&agrave;i \\u0111\\u1ea7y c&aacute; t&iacute;nh, kh&ocirc;ng l\\u1ed9 ti<\\/p>\\r\\n\\r\\n<p>- &Aacute;o ng\\u1ef1c kh&ocirc;ng g\\u1ecdng, kh&ocirc;ng m&uacute;t h\\u1ed7 tr\\u1ee3 \\u0111\\u1ecbnh h&igrave;nh b\\u1ea7u ng\\u1ef1c<\\/p>\\r\\n\\r\\n<p>- Ch&acirc;t li\\u1ec7u ren nh\\u1eb9 nh&agrave;ng, tho&aacute;ng m&aacute;t<\\/p>\\r\\n\\r\\n<p>- M&agrave;u s\\u1eafc phong ph&uacute;.<\\/p>\\r\\n\\r\\n<p>- Size &aacute;o \\u0111a d\\u1ea1ng, c&oacute; d&acirc;y t\\u0103ng ch\\u1ec9nh vai ph&ugrave; h\\u1ee3p v\\u1edbi d&aacute;ng ng\\u01b0\\u1eddi.<\\/p>\\r\\n\\r\\n<p>- Sz: S, M, L<\\/p>\\r\\n\\r\\n<p>- M&agrave;u: nh\\u01b0 h&igrave;nh<\\/p>\\r\\n\\r\\n<p>Bralette l&agrave; ki\\u1ec3u n\\u1ed9i y &quot;M\\u1eb7c nh\\u01b0 kh&ocirc;ng m\\u1eb7c&quot;. Bralette s\\u1ebd gi&uacute;p v&ograve;ng 1 c\\u1ee7a b\\u1ea1n g&aacute;i c&oacute; th\\u1eddi gian th\\u1edf v&agrave; ngh\\u1ec9 ng\\u01a1i. Bralette tho&aacute;ng, m\\u1ecfng nh\\u1eb9, th&iacute;ch h\\u1ee3p cho nh\\u1eefng ng&agrave;y h&egrave; n&oacute;ng n\\u1ef1c. Bralette kh&ocirc;ng h\\u1ec1 k&eacute;n d&aacute;ng ng\\u1ef1c, \\u0111\\u1eb7c bi\\u1ec7t ph&ugrave; h\\u1ee3p v\\u1edbi c&aacute;c n&agrave;ng ng\\u1ef1c nh\\u1ecf h\\u01a1n so v\\u1edbi c&aacute;c n&agrave;ng ng\\u1ef1c to, v&igrave; n&oacute; kh&ocirc;ng qu&aacute; ph&ocirc; hay sexy.<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/1%20ao-lot-nu-3.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/1%20ao-lot-nu-1.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/1%20ao-lot-nu-2.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('147', null, null, null, 'Áo lá cổ choàng sexy', 'HH147', 'ao-la-co-choang-sexy', '2.jpg', '1', '1', '1', null, '55', '1', '230000', '160000', '<p>&Aacute;o l&aacute; cổ yếm được thiết kế dạng cổ yếm d&acirc;y ch&eacute;o lưng rất tinh tế, sang trọng cuốn h&uacute;t đầy nữ t&iacute;nh. Chất thun ren kh&ocirc;ng những tạo cảm gi&aacute;c thoải m&aacute;i m&agrave; c&ograve;n tạo vẻ cuốn h&uacute;t cho bạn g&aacute;i với d&acirc;y&nbsp;</p>\r\n', '', null, '', '', null, null, '0', '0', '53', null, null, null, null, null, '85', '0', null, 'vi', null, '1523084573', '', '29032018', null, null, '1', null, null, null, '4', '4', '1', null, '0', '[{\"content\":\"<p><strong>&Aacute;o l&aacute; c\\u1ed5 y\\u1ebfm<\\/strong>&nbsp;\\u0111\\u01b0\\u1ee3c thi\\u1ebft k\\u1ebf d\\u1ea1ng c\\u1ed5 y\\u1ebfm d&acirc;y ch&eacute;o l\\u01b0ng&nbsp;r\\u1ea5t tinh t\\u1ebf, sang tr\\u1ecdng cu\\u1ed1n h&uacute;t \\u0111\\u1ea7y n\\u1eef t&iacute;nh. Ch\\u1ea5t thun ren kh&ocirc;ng nh\\u1eefng t\\u1ea1o c\\u1ea3m gi&aacute;c tho\\u1ea3i m&aacute;i m&agrave; c&ograve;n t\\u1ea1o v\\u1ebb cu\\u1ed1n h&uacute;t cho b\\u1ea1n g&aacute;i v\\u1edbi d&acirc;y \\u0111an ch&eacute;o c&aacute;ch \\u0111i\\u1ec7u.<\\/p>\\r\\n\\r\\n<p>- Ch\\u1ea5t li\\u1ec7u: &aacute;o thun c\\u1ed5 y\\u1ebfm ren&nbsp;cao c\\u1ea5p 4 chi\\u1ec1u, d&acirc;y thun \\u0111&agrave;n h\\u1ed3i.<\\/p>\\r\\n\\r\\n<p>- B\\u1ea7u ng\\u1ef1c: &aacute;o c\\u1ed5 y\\u1ebfm \\u0111\\u1eb9p&nbsp;m&uacute;t m\\u1ecfng th&ocirc;ng tho&aacute;ng, l&oacute;t cotton m\\u1eb7t trong th\\u1ea5m h&uacute;t m\\u1ed3 h&ocirc;i t\\u1ea1o c\\u1ea3m gi&aacute;c m&aacute;t m\\u1ebb.<\\/p>\\r\\n\\r\\n<p>- \\u01afu \\u0111i\\u1ec3m: n\\u1eef t&iacute;nh, trang nh&atilde;, d\\u1ec5 m\\u1eb7c, n&acirc;ng ng\\u1ef1c, b\\u1ec1n l&acirc;u, \\u0111\\u1ea3m b\\u1ea3o s\\u1ee9c kho\\u1ebb, gi&aacute; h\\u1ee3p l&yacute;<\\/p>\\r\\n\\r\\n<p>- Ph&ugrave; h\\u1ee3p: m\\u1eabu &aacute;o c\\u1ed5 y\\u1ebfm n&agrave;y ph&ugrave; h\\u1ee3p v\\u1edbi ng\\u01b0\\u1eddi ng\\u1ef1c trung b&igrave;nh v&agrave; to, di\\u1ec7n &aacute;o s\\u01a1 mi, &aacute;o d&agrave;i, &aacute;o c\\u1ed5 s&acirc;u, ho\\u1eb7c l&agrave;m bra t\\u1eadp gym c\\u0169ng ok nh&eacute;.<\\/p>\\r\\n\\r\\n<p>- M&agrave;u: \\u0110en, tr\\u1eafng<\\/p>\\r\\n\\r\\n<p>- Size: Free size (thun \\u0111\\u1eb9p h&agrave;ng lo\\u1ea1i 1 n&ecirc;n b\\u1ea3o \\u0111\\u1ea3m c&aacute;c n&agrave;ng 32A \\u0111\\u1ebfn 36A m\\u1eb7c v\\u1eeba)<\\/p>\\r\\n\\r\\n<p>- \\u0110\\u1ed3ng Gi&aacute; : 120K\\/c&aacute;i<\\/p>\\r\\n\\r\\n<p>&Aacute;o l&aacute; kh&ocirc;ng ch\\u1ec9 ri&ecirc;ng ng\\u01b0\\u1eddi l\\u1edbn m\\u1eb7c khi ph\\u1ed1i v\\u1edbi trang ph\\u1ee5c m\\u1ecfng, c&aacute;c b&eacute; tu\\u1ed5i teen c\\u0169ng c\\u1ea7n \\u0111\\u1ea5y. \\u0110\\u1eebng qu&ecirc;n n\\u1ed9i y cho b&eacute; nh&eacute;, v&igrave; \\u0111&oacute; l&agrave; tr\\u1ee3 th\\u1ee7 \\u0111\\u1eafc l\\u1ef1c gi&uacute;p b&eacute; d\\u1ec5 th\\u1edf, t\\u1eadp trung v&agrave;o h\\u1ecdc t\\u1eadp, kh&ocirc;ng ph\\u1ea3i lu\\u1ed1ng cu\\u1ed1ng khom l\\u01b0ng che ph\\u1ea7n ti v\\u1eeba nh&uacute; nh&eacute;.<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/2%20ao-lot-nu-1.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/2%20ao-lot-nu-2.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/2%20ao-lot-nu-3.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"M\\u00e3 s\\u1ea3n ph\\u1ea9m\",\"type\":\"text\",\"sort\":\"\"}]', '', null);
INSERT INTO `product` VALUES ('112', null, null, null, 'Váy Nữ Xòe  H01', 'HH112', 'vay-nu-xoe-h01', 'vay-nu-01.jpg', '1', '1', '1', null, '2', '1', '350000', '300000', '', '', null, '', '', null, null, '0', '0', '37', null, null, null, null, null, '52', '0', null, 'vi', null, '1522311113', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('138', null, null, null, 'Quần short Jeans hoa hồng-B9821', 'HH138', 'quan-short-jeans-hoa-hong-b9821', 'quan-short-jeans-hoa-hong-b9821.jpg', '1', '1', '1', null, '2', '1', '200000', '140000', '', '', null, '', '', null, null, '0', '0', '41', null, null, null, null, null, '76', '0', null, 'vi', null, '1522314238', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('139', null, null, null, 'Quần short jeans tại Cầu Giấy -B805', 'HH139', 'quan-short-jeans-tai-cau-giay-b805', 'quan-short-jeans-tai-cau-giay-b805.jpg', '1', '1', '0', null, '3', '1', '230000', '160000', '', '', null, '', '', null, null, '0', '0', '41', null, null, null, null, null, '77', '0', null, 'vi', null, '1522314267', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('113', null, null, null, 'Váy Nữ Xòe H02', 'HH113', 'vay-nu-xoe-h02', 'vay-nu-02.jpg', '1', '1', '0', null, '5', '1', '380000', '330000', '', '', null, '', '', null, null, '0', '0', '37', null, null, null, null, null, '53', '0', null, 'vi', null, '1522311010', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('135', null, null, null, 'Áo Siêu Nhẹ H23', 'HH135', 'ao-sieu-nhe-h23', 'ao-phao-nu-07.jpg', '1', '1', null, null, '14', '1', '1400000', '850000', '', '', null, '', '', null, null, '0', '0', '36', null, null, null, null, null, '73', '0', null, 'vi', null, '1522462353', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p>Th\\u1eddi ti\\u1ebft m&ugrave;a \\u0111&ocirc;ng lu&ocirc;n khi\\u1ebfn cho c&aacute;c n&agrave;ng \\u0111au \\u0111\\u1ea7u v&igrave; kh&ocirc;ng bi\\u1ebft l\\u1ef1a ch\\u1ecdn m\\u1eabu &aacute;o n&agrave;o v\\u1eeba gi\\u1eef nhi\\u1ec7t t\\u1ed1t l\\u1ea1i v\\u1eeba c&oacute; t&iacute;nh th\\u1eddi trang cao. V\\u1edbi mong mu\\u1ed1n \\u0111&aacute;p \\u1ee9ng nhu c\\u1ea7u m&agrave; s\\u1edf th&iacute;ch c\\u1ee7a kh&aacute;ch h&agrave;ng&nbsp;<strong>Azala<\\/strong>&nbsp;\\u0111&atilde; c\\u1eadp nh\\u1eadt v&agrave; gi\\u1edbi thi\\u1ec7u ra th\\u1ecb tr\\u01b0\\u1eddng h&agrave;ng tr\\u0103m m\\u1eabu&nbsp;<strong>&aacute;o phao ch\\u1ea7n b&ocirc;ng&nbsp;<\\/strong>si&ecirc;u \\u1ea5m v\\u1edbi ki\\u1ec3u d&aacute;ng kh&aacute;c nhau. \\u0110\\u1ebfn v\\u1edbi&nbsp;<strong>Azala<\\/strong>&nbsp;ch&uacute;ng t&ocirc;i tin ch\\u1eafc r\\u1eb1ng b\\u1ea1n s\\u1ebd t&igrave;m \\u0111\\u01b0\\u1ee3c cho m&igrave;nh m\\u1eabu &aacute;o ho&agrave;n h\\u1ea3o nh\\u1ea5t!<br \\/>\\r\\n<br \\/>\\r\\n<strong>Th&ocirc;ng tin s\\u1ea3n ph\\u1ea9m:<\\/strong><br \\/>\\r\\n- M&agrave;u s\\u1eafc: \\u0111\\u1ecf t\\u01b0\\u01a1i<br \\/>\\r\\n- Kho h&agrave;ng: c&oacute; s\\u1eb5n<br \\/>\\r\\n- Ki\\u1ec3u d&aacute;ng: d&aacute;ng ng\\u1eafn ph\\u1ed1i m\\u0169<br \\/>\\r\\n- Ch\\u1ea5t li\\u1ec7u: phao ch\\u1ea7n b&ocirc;ng si&ecirc;u \\u1ea5m<br \\/>\\r\\n- Size: S,M,L,XL.<br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k256\\/ao%20phao%20gia%20re.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><strong>\\u0110\\u1eb7c \\u0111i\\u1ec3m n\\u1ed5i b\\u1eadt:<\\/strong><br \\/>\\r\\nNh\\u1edd v\\u1ebb ngo&agrave;i g\\u1ecdn g&agrave;ng, n\\u0103ng \\u0111\\u1ed9ng m&agrave; c&aacute; t&iacute;nh, xinh y&ecirc;u m&agrave; v&ocirc; c&ugrave;ng duy&ecirc;n d&aacute;ng, ng\\u1ecdt ng&agrave;o, &aacute;o kho&aacute;c phao n\\u1eef d&aacute;ng ng\\u1eafn c\\u1ee7a&nbsp;<strong>Azala<\\/strong>&nbsp;khi\\u1ebfn cho t\\u1ea5t c\\u1ea3 m\\u1ecdi c&ocirc; g&aacute;i \\u0111\\u1ec1u n\\u1ed5i b\\u1eadt \\u1ea5n t\\u01b0\\u1ee3ng quy\\u1ebfn r\\u0169 nh\\u1ea5t trong m\\u1eaft m\\u1ecdi ng\\u01b0\\u1eddi.&nbsp;C&aacute;c thi\\u1ebft k\\u1ebf &aacute;o phao n\\u1eef d&aacute;ng ng\\u1eafn gi&uacute;p b\\u1ea1n g&aacute;i th&ecirc;m tho\\u1ea3i m&aacute;i v&agrave; t\\u1ef1 tin trong nh\\u1eefng ho\\u1ea1t \\u0111\\u1ed9ng ng&agrave;y thu \\u0111&ocirc;ng. M&agrave;u s\\u1eafc si&ecirc;u n\\u1ed5i b\\u1eadt c&ugrave;ng v\\u1edbi ki\\u1ec3u dnags&nbsp;bo eo n&agrave;y ch&iacute;nh l&agrave; m&oacute;n \\u0111\\u1ed3 \\u0111i\\u1ec3m t&ocirc; cho n&eacute;t n\\u1eef t&iacute;nh v&agrave; thanh l\\u1ecbch c\\u1ee7a b\\u1ea1n g&aacute;i.&nbsp;<strong>&Aacute;o phao d&aacute;ng ng\\u1eafn<\\/strong>&nbsp;ch&iacute;nh l&agrave; m\\u1eabu &aacute;o \\u0111a n\\u0103ng v&agrave; th&ocirc;ng d\\u1ee5ng nh\\u1ea5t hi\\u1ec7n nay, ph&ugrave; h\\u1ee3p v\\u1edbi m\\u1ecdi l\\u1ee9a tu\\u1ed5i v&agrave; phong c&aacute;ch th\\u1eddi trang.&nbsp;<br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k256\\/ao%20phao%20nu%20sieu%20am.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<strong>G\\u1ee3i &yacute; mix \\u0111\\u1ed3:<\\/strong><br \\/>\\r\\n<strong>&Aacute;o phao d&aacute;ng ng\\u1eafn<\\/strong>&nbsp;l&agrave; m\\u1eabu &aacute;o r\\u1ea5t \\u0111\\u01b0\\u1ee3c \\u01b0a chu\\u1ed9ng trong th\\u1eddi gian g\\u1ea7n \\u0111&acirc;y. Ch&iacute;nh v&igrave; v\\u1eady,&nbsp;<strong>Azala<\\/strong>&nbsp;g\\u1ee3i &yacute; cho b\\u1ea1n c&aacute;ch mix \\u0111\\u1ed3 v\\u1edbi&nbsp;<strong>&aacute;o phao d&aacute;ng ng\\u1eafn&nbsp;<\\/strong>\\u0111\\u1ec3 tr&ocirc;ng tr\\u1edf n&ecirc;n n\\u1ed5i b\\u1eadt v&agrave; s&agrave;nh \\u0111i\\u1ec7u. V\\u1edbi combo \\u0111\\u1ed3: &aacute;o phao + ch&acirc;n v&aacute;y + boots l&agrave; b\\u1ea1n \\u0111&atilde; c&oacute; 1 set \\u0111\\u1ed3 ho&agrave;n h\\u1ea3o cho ng&agrave;y l\\u1ea1nh r\\u1ed3i \\u0111\\u1ea5y.<\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k256\\/ao%20phao%20nu.jpg\\\" \\/><br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k256\\/ao%20phao%20sieu%20am.jpg\\\" \\/><br \\/>\\r\\n<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k256\\/ao%20phao%20sieu%20dep.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<strong>Cam k\\u1ebft v\\u1edbi kh&aacute;ch h&agrave;ng:<\\/strong><\\/p>\\r\\n\\r\\n<p>- H&agrave;ng chu\\u1ea9n y h&igrave;nh 100%.<br \\/>\\r\\n- G&iacute;a t\\u1ed1t nh\\u1ea5t th\\u1ecb tr\\u01b0\\u1eddng.<br \\/>\\r\\n- Nh\\u1eadn \\u0111\\u1ed5i tr\\u1ea3 h&agrave;ng \\u0111\\u1ed1i v\\u1edbi h&agrave;ng l\\u1ed7i.<br \\/>\\r\\n- Giao h&agrave;ng to&agrave;n qu\\u1ed1c thu ti\\u1ec1n t\\u1ea1i nh&agrave;.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><strong>Hotline: 0975.979.907<br \\/>\\r\\nGiao h&agrave;ng t\\u1eadn nh&agrave;- Tr\\u1ea3 ti\\u1ec1n khi giao- \\u0110\\u1ed5i h&agrave;ng trong v&ograve;ng 7 ng&agrave;y<br \\/>\\r\\nC&ograve;n ng\\u1ea7n ng\\u1ea1i g&igrave;?<\\/strong>&nbsp;H&atilde;y li&ecirc;n h\\u1ec7 \\u0111\\u1eb7t h&agrave;ng ngay h&ocirc;m nay \\u0111\\u1ec3 nh\\u1eadn \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u \\u01b0u \\u0111&atilde;i c\\u1ef1c k&igrave; h\\u1ea5p d\\u1eabn n&agrave;o.<\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('136', null, null, null, 'Quần short hoa hồng-B9821', 'HH136', 'quan-short-hoa-hong-b9821', 'quan-short-hoa-hong-b9821.jpg', '1', '1', '0', null, '3', '1', '250000', '180000', '', '', null, '', '', null, null, '0', '0', '41', null, null, null, null, null, '74', '0', null, 'vi', null, '1522314157', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('137', null, null, null, 'Quần short jeans cao cấp-B2821', 'HH137', 'quan-short-jeans-cao-cap-b2821', 'quan-short-jeans-cao-cap-b2821.jpg', '1', '1', '0', null, '3', '1', '280000', '220000', '', '', null, '', '', null, null, '0', '0', '41', null, null, null, null, null, '75', '0', null, 'vi', null, '1522314199', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('114', null, null, null, 'Váy Nữ Xòe H03', 'HH114', 'vay-nu-xoe-h03', 'vay-nu-03.jpg', '1', '1', '0', null, '4', '1', '420000', '350000', '', '', null, '', '', null, null, '0', '0', '37', null, null, null, null, null, '54', '0', null, 'vi', null, '1522311054', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('126', null, null, null, 'Áo Lông Cừu H13', 'HH126', 'ao-long-cuu-h13', 'ao-long-03.JPG', '1', '1', null, null, '4', '1', '1400000', '1100000', '', '', null, '', '', null, null, '0', '0', '35', null, null, null, null, null, '64', '0', null, 'vi', null, '1522311528', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('127', null, null, null, 'Áo Lông Vũ H14', 'HH127', 'ao-long-vu-h14', 'ao-long-04jpg.jpg', '1', '1', null, null, '4', '1', '1300000', '950000', '', '', null, '', '', null, null, '0', '0', '35', null, null, null, null, null, '65', '0', null, 'vi', null, '1522311568', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('128', null, null, null, 'Áo Lông Thỏ H15', 'HH128', 'ao-long-tho-h15', 'ao-long-06.jpg', '1', '1', '0', null, '4', '1', '1300000', '950000', '', '', null, '', '', null, null, '0', '0', '35', null, null, null, null, null, '66', '0', null, 'vi', null, '1522311653', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('129', null, null, null, 'Áo Phao Dáng Dài H17', 'HH129', 'ao-phao-dang-dai-h17', 'ao-phao-nu-01.jpg', '1', '1', null, null, '6', '1', '1050000', '850000', '', '', null, '', '', null, null, '0', '0', '36', null, null, null, null, null, '67', '0', null, 'vi', null, '1522466555', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/1912\\/k280\\/ao%20phao%20co%20long.jpg\\\" \\/><br \\/>\\r\\n<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/1912\\/k280\\/ao%20phao%20nu%20co%20long%20dang%20dai.jpg\\\" \\/><br \\/>\\r\\n<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/1912\\/k280\\/ao%20phao%20nu%20co%20long.jpg\\\" \\/><br \\/>\\r\\n<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/1912\\/k280\\/ao%20phao%20nu%20dang%20dai.jpg\\\" \\/><br \\/>\\r\\n<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/1912\\/k280\\/ao%20phao%20nu.jpg\\\" \\/><\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"<p><strong>Th&ocirc;ng tin s\\u1ea3n ph\\u1ea9m:<\\/strong><br \\/>\\r\\n- Ngu\\u1ed3n g\\u1ed1c: h&agrave;ng Qu\\u1ea3ng Ch&acirc;u cao c\\u1ea5p<br \\/>\\r\\n- Kho h&agrave;ng: c&oacute; s\\u1eb5n<br \\/>\\r\\n- M&agrave;u s\\u1eafc: \\u0111\\u1ecf&nbsp;<br \\/>\\r\\n- Ch\\u1ea5t li\\u1ec7u: &aacute;o phao ch\\u1ea7n b&ocirc;ng si&ecirc;u \\u1ea5m<br \\/>\\r\\n- Ki\\u1ec3u d&aacute;ng: d&aacute;ng ng\\u1eafn<br \\/>\\r\\n- Size: S, M,L,XL.<\\/p>\\r\\n\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('130', null, null, null, 'Áo Phao Dáng Dài H18', 'HH130', 'ao-phao-dang-dai-h18', 'ao-phao-nu-03.jpg', '1', '1', null, null, '4', '1', '950000', '650000', '<p>Nếu bạn th&iacute;ch sự trẻ trung v&agrave; hiện đại th&igrave; c&oacute; lẽ kh&ocirc;ng g&igrave; th&iacute;ch hợp hơn l&agrave; những chiếc&nbsp;<strong>&aacute;o phao nữ m&agrave;u xanh r&ecirc;u</strong>. C&oacute; thể ph&ugrave; hợp với mọi d&aacute;ng người, mọi lứa tuổi v&agrave; mọi nghề nghiệp kh&aacute;c nhau,&nbsp;<strong>&aacute;o phao nữ m&agrave;u xanh r&ecirc;u&nbsp;</strong>xứng đ&aacute;ng l&agrave; một loại trang phục cần phải c&oacute; trong tủ quần &aacute;o của bạn trong m&ugrave;a đ&ocirc;ng năm n&agrave;y.</p>\r\n', '', null, '', '', null, null, '0', '0', '36', null, null, null, null, null, '68', '0', null, 'vi', null, '1522466398', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p>N\\u1ebfu b\\u1ea1n th&iacute;ch s\\u1ef1 tr\\u1ebb trung v&agrave; hi\\u1ec7n \\u0111\\u1ea1i th&igrave; c&oacute; l\\u1ebd kh&ocirc;ng g&igrave; th&iacute;ch h\\u1ee3p h\\u01a1n l&agrave; nh\\u1eefng chi\\u1ebfc&nbsp;<strong>&aacute;o phao n\\u1eef m&agrave;u xanh r&ecirc;u<\\/strong>. C&oacute; th\\u1ec3 ph&ugrave; h\\u1ee3p v\\u1edbi m\\u1ecdi d&aacute;ng ng\\u01b0\\u1eddi, m\\u1ecdi l\\u1ee9a tu\\u1ed5i v&agrave; m\\u1ecdi ngh\\u1ec1 nghi\\u1ec7p kh&aacute;c nhau,&nbsp;<strong>&aacute;o phao n\\u1eef m&agrave;u xanh r&ecirc;u&nbsp;<\\/strong>x\\u1ee9ng \\u0111&aacute;ng l&agrave; m\\u1ed9t lo\\u1ea1i trang ph\\u1ee5c c\\u1ea7n ph\\u1ea3i c&oacute; trong t\\u1ee7 qu\\u1ea7n &aacute;o c\\u1ee7a b\\u1ea1n trong m&ugrave;a \\u0111&ocirc;ng n\\u0103m n&agrave;y.<br \\/>\\r\\n<br \\/>\\r\\n<strong>\\u0110\\u1eb7c \\u0111i\\u1ec3m n\\u1ed5i b\\u1eadt:<\\/strong><br \\/>\\r\\n<strong>&Aacute;o phao n\\u1eef m&agrave;u xanh r&ecirc;u<\\/strong>&nbsp;v\\u1eabn l&agrave; m\\u1eabu&nbsp;<strong>&aacute;o phao d&aacute;ng ng\\u1eafn<\\/strong>&nbsp;th\\u01b0\\u1eddng th\\u1ea5y nh\\u01b0ng nh\\u1eefng \\u0111\\u01b0\\u1eddng c\\u1eaft&nbsp;r\\u1ea5t g\\u1ecdn g&agrave;ng v&agrave; chu\\u1ea9n x&aacute;c, m&agrave;u xanh r&ecirc;u tr\\u1ebb trung \\u0111&atilde; khi\\u1ebfn chi\\u1ebfc<strong>&nbsp;&aacute;o phao m&agrave;u xanh r&ecirc;u&nbsp;<\\/strong>n&agrave;y tr\\u1edf n&ecirc;n s&agrave;nh \\u0111i\\u1ec7u v&agrave; th\\u1eddi trang h\\u01a1n bao gi\\u1edd h\\u1ebft.<br \\/>\\r\\n&Aacute;o \\u0111\\u01b0\\u1ee3c may b\\u1eb1ng v\\u1ea3i phao b&ocirc;ng&nbsp;m\\u1ec1m m\\u1ecbn, tho\\u1ea3i m&aacute;i, ch\\u1ed1ng nh\\u0103n, ch\\u1ed1ng b\\u1ee5i t\\u1ed1t, b&ecirc;n trong l&agrave; l\\u1edbp l&oacute;t b&ocirc;ng gi\\u1eef nhi\\u1ec7t cao c\\u1ea5p c&oacute; s\\u1ef1 li&ecirc;n k\\u1ebft c\\u1ea5u tr&uacute;c s\\u1ee3i v\\u1ea3i ch\\u1eb7t ch\\u1ebd v\\u1eeba tho&aacute;ng kh&iacute; l\\u1ea1i ch\\u1ed1ng gi&oacute;, ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; gi\\u1eef \\u1ea5m t\\u1ed1i \\u0111a cho ng\\u01b0\\u1eddi m\\u1eb7c.V\\u1eabn l&agrave; chi\\u1ebfc m\\u0169 li\\u1ec1n &aacute;o th\\u1eddi trang&nbsp; \\u0111em l\\u1ea1i c\\u1ea3m gi&aacute;c \\u1ea5m &aacute;p tuy\\u1ec7t \\u0111\\u1ed1i khi m\\u1eb7c.<br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/dot%203\\/k222\\/ao%20phao%20dang%20ngan.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<strong>Th&ocirc;ng tin s\\u1ea3n ph\\u1ea9m:<\\/strong><br \\/>\\r\\n- M&atilde; s\\u1ea3n ph\\u1ea9m: K222<br \\/>\\r\\n- Ch\\u1ea5t li\\u1ec7u: phao b&ocirc;ng si&ecirc;u \\u1ea5m<br \\/>\\r\\n- M&agrave;u s\\u1eafc: xanh r&ecirc;u<\\/p>\\r\\n\\r\\n<p>- Size: S,M,L,XL.<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/dot%203\\/k222\\/ao%20phao%20moi.jpg\\\" \\/><br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><strong>G\\u1ee3i &yacute; mix \\u0111\\u1ed3:<\\/strong><br \\/>\\r\\nC&aacute;c c&ocirc; n&agrave;ng tr\\u1ebb trung ch\\u1eafc h\\u1eb3n r\\u1ea5t th&iacute;ch chi\\u1ebfc&nbsp;<strong>&aacute;o phao n\\u1eef m&agrave;u xanh r&ecirc;u<\\/strong>&nbsp;- item \\u0111&atilde; &quot;l&agrave;m m\\u01b0a l&agrave;m gi&oacute;&quot; su\\u1ed1t m&ugrave;a \\u0111&ocirc;ng&nbsp;v\\u1eeba qua. H&atilde;y t\\u1eadn d\\u1ee5ng n&oacute; v&agrave;o m&ugrave;a \\u0111&ocirc;ng n&agrave;y b\\u1eb1ng c&aacute;ch layering kh&eacute;o l&eacute;o v&agrave; mix ch&uacute;ng&nbsp;c&ugrave;ng skinny jeans + boots nh&eacute;!<br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/dot%203\\/k222\\/ao%20phao%20nu%20dang%20ngan.jpg\\\" \\/><br \\/>\\r\\n&Aacute;o phao r&ecirc;u d&aacute;ng ng\\u1eafn ph\\u1ed1i m\\u0169 hi\\u1ec7n \\u0111\\u1ea1i<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/dot%203\\/k222\\/ao%20phao%20nu.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<strong>Cam k\\u1ebft v\\u1edbi kh&aacute;ch h&agrave;ng:<\\/strong><br \\/>\\r\\n- H&agrave;ng chu\\u1ea9n y h&igrave;nh 100%.<br \\/>\\r\\n- G&iacute;a t\\u1ed1t nh\\u1ea5t th\\u1ecb tr\\u01b0\\u1eddng.<br \\/>\\r\\n- Nh\\u1eadn \\u0111\\u1ed5i tr\\u1ea3 h&agrave;ng \\u0111\\u1ed1i v\\u1edbi h&agrave;ng l\\u1ed7i.<br \\/>\\r\\n- Giao h&agrave;ng to&agrave;n qu\\u1ed1c thu ti\\u1ec1n t\\u1ea1i nh&agrave;.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><strong>Hotline: 0975.979.907<br \\/>\\r\\nGiao h&agrave;ng t\\u1eadn nh&agrave;- Tr\\u1ea3 ti\\u1ec1n khi giao- \\u0110\\u1ed5i h&agrave;ng trong v&ograve;ng 7 ng&agrave;y<br \\/>\\r\\nC&ograve;n ng\\u1ea7n ng\\u1ea1i g&igrave;?<\\/strong>&nbsp;H&atilde;y li&ecirc;n h\\u1ec7 \\u0111\\u1eb7t h&agrave;ng ngay h&ocirc;m nay \\u0111\\u1ec3 nh\\u1eadn \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u \\u01b0u \\u0111&atilde;i c\\u1ef1c k&igrave; h\\u1ea5p d\\u1eabn n&agrave;o.<\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"<p><strong>Th&ocirc;ng tin s\\u1ea3n ph\\u1ea9m:<\\/strong><br \\/>\\r\\n- M&atilde; s\\u1ea3n ph\\u1ea9m: K222<br \\/>\\r\\n- Ch\\u1ea5t li\\u1ec7u: phao b&ocirc;ng si&ecirc;u \\u1ea5m<br \\/>\\r\\n- M&agrave;u s\\u1eafc: xanh r&ecirc;u<\\/p>\\r\\n\\r\\n<p>- Size: S,M,L,XL.<\\/p>\\r\\n\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('131', null, null, null, 'Áo Phao Dáng Dài H19', 'HH131', 'ao-phao-dang-dai-h19', 'ao-phao-nu-09.jpg', '1', null, null, null, '10', '1', '1300000', '8900000', '<p>Ng&agrave;y đại h&agrave;n,&nbsp;<strong>&aacute;o phao</strong>&nbsp;l&agrave; loại &aacute;o kh&ocirc;ng thể thiếu. Theo khảo s&aacute;t tr&ecirc;n đường phố,&nbsp;<strong>&aacute;o phao</strong>&nbsp;chiếm đến 80% số lượng &aacute;o kho&aacute;c m&agrave; mọi người sử dụng khi trời lạnh. Ch&iacute;nhh v&igrave; vậy,&nbsp;<strong>Azala</strong>&nbsp;đ&atilde; nhập về h&agrave;ng trăm mẫu&nbsp;<strong>&aacute;o phao</strong>kiểu d&aacute;ng kh&aacute;c nhau để c&aacute;c c&ocirc; g&aacute;i của ch&uacute;ng ta tha hồ lựa chọn.</p>\r\n', '', null, '', '', null, null, '0', '0', '36', null, null, null, null, null, '69', '0', null, 'vi', null, '1522466254', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p>Ng&agrave;y \\u0111\\u1ea1i h&agrave;n,&nbsp;<strong>&aacute;o phao<\\/strong>&nbsp;l&agrave; lo\\u1ea1i &aacute;o kh&ocirc;ng th\\u1ec3 thi\\u1ebfu. Theo kh\\u1ea3o s&aacute;t tr&ecirc;n \\u0111\\u01b0\\u1eddng ph\\u1ed1,&nbsp;<strong>&aacute;o phao<\\/strong>&nbsp;chi\\u1ebfm \\u0111\\u1ebfn 80% s\\u1ed1 l\\u01b0\\u1ee3ng &aacute;o kho&aacute;c m&agrave; m\\u1ecdi ng\\u01b0\\u1eddi s\\u1eed d\\u1ee5ng khi tr\\u1eddi l\\u1ea1nh. Ch&iacute;nhh v&igrave; v\\u1eady,&nbsp;<strong>Azala<\\/strong>&nbsp;\\u0111&atilde; nh\\u1eadp v\\u1ec1 h&agrave;ng tr\\u0103m m\\u1eabu&nbsp;<strong>&aacute;o phao<\\/strong>ki\\u1ec3u d&aacute;ng kh&aacute;c nhau \\u0111\\u1ec3 c&aacute;c c&ocirc; g&aacute;i c\\u1ee7a ch&uacute;ng ta tha h\\u1ed3 l\\u1ef1a ch\\u1ecdn.<br \\/>\\r\\n<br \\/>\\r\\n<strong>Th&ocirc;ng tin s\\u1ea3n ph\\u1ea9m:<\\/strong><br \\/>\\r\\n- Xu\\u1ea5t x\\u1ee9: h&agrave;ng Qu\\u1ea3ng Ch&acirc;u lo\\u1ea1i 1<br \\/>\\r\\n- Ch\\u1ea5t li\\u1ec7u: &aacute;o phao ch\\u1ea7n b&ocirc;ng si&ecirc;u \\u1ea5m<br \\/>\\r\\n- Kho h&agrave;ng: h&agrave;ng c&oacute; s\\u1eb5n<br \\/>\\r\\n- Ki\\u1ec3u d&aacute;ng: d&aacute;ng ng\\u1eafn ph\\u1ed1i m\\u0169<br \\/>\\r\\n- M&agrave;u s\\u1eafc: h\\u1ed3ng<br \\/>\\r\\n- Size: S,M,L,XL.<\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k259\\/ao%20phao%20nu%20dang%20ngan%20gia%20re.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<strong>\\u0110\\u1eb7c \\u0111i\\u1ec3m n\\u1ed5i b\\u1eadt:<\\/strong><br \\/>\\r\\n<strong>&Aacute;o kho&aacute;c phao<\\/strong>&nbsp;lu&ocirc;n l&agrave; item \\u0111\\u1eafc l\\u1ef1c \\u0111\\u1ec3 &ldquo;ch\\u1ed1ng ch\\u1ecdi&rdquo; th\\u1eddi ti\\u1ebft m\\u01b0a l\\u1ea1nh c\\u1ee7a mi\\u1ec1n B\\u1eafc. Ki\\u1ec3u &aacute;o n&agrave;y ng&agrave;y c&agrave;ng \\u0111a d\\u1ea1ng v\\u1ec1 phom d&aacute;ng, m&agrave;u s\\u1eafc gi&uacute;p b\\u1ea1n d\\u1ec5 d&agrave;ng l\\u1ef1a ch\\u1ecdn theo s\\u1edf th&iacute;ch.M\\u1eabu &aacute;o v\\u1edbi \\u0111\\u1eb7c tr\\u01b0ng si&ecirc;u \\u1ea5m&nbsp;n&agrave;y kh&ocirc;ng qu&aacute; kh&oacute; k\\u1ebft h\\u1ee3p trang ph\\u1ee5c nh\\u01b0 nhi\\u1ec1u ng\\u01b0\\u1eddi v\\u1eabn ngh\\u0129, ng\\u01b0\\u1ee3c l\\u1ea1i n&oacute; c&oacute; th\\u1ec3 d\\u1ec5 d&agrave;ng \\u0103n &yacute; v\\u1edbi h\\u1ea7u h\\u1ebft c&aacute;c item nh\\u01b0 qu\\u1ea7n jeans, legging, ch&acirc;n v&aacute;y&hellip;<\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k259\\/ao%20phao%20nu%20gia%20re.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<strong>G\\u1ee3i &yacute; mix \\u0111\\u1ed3:<\\/strong><br \\/>\\r\\n<strong>&Aacute;o phao<\\/strong>&nbsp;ho&agrave;n to&agrave;n c&oacute; th\\u1ec3 mix c&ugrave;ng ch&acirc;n v&aacute;y m\\u1ec1m m\\u1ea1i, n\\u1eef t&iacute;nh v&agrave; gi&agrave;y cao g&oacute;t.&nbsp;<strong>&Aacute;o kho&aacute;c phao d&aacute;ng ng\\u1eafn<\\/strong>hi\\u1ec7n \\u0111\\u01b0\\u1ee3c c&aacute;c fashionista \\u01b0a chu\\u1ed9ng h\\u01a1n c\\u1ea3. \\u0110\\u1ed1i v\\u1edbi d&aacute;ng &aacute;o n&agrave;y, b\\u1ea1n c&oacute; th\\u1ec3 ph\\u1ed1i c&ugrave;ng qu\\u1ea7n th\\u1ec3 thao, qu\\u1ea7n jeans \\u1ed1ng v\\u1ea9y hay ch&acirc;n v&aacute;y \\u0111\\u1ec1u th&iacute;ch h\\u1ee3p.<br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k259\\/ao%20phao%20nu%20sieu%20am.jpg\\\" \\/><br \\/>\\r\\n<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k259\\/ao%20phao%20nu.jpg\\\" \\/><br \\/>\\r\\n<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/aophao1208\\/k259\\/ao%20phao%20sieu%20dep.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><strong>Cam k\\u1ebft v\\u1edbi kh&aacute;ch h&agrave;ng:<\\/strong><br \\/>\\r\\n- H&agrave;ng chu\\u1ea9n y h&igrave;nh 100%.<br \\/>\\r\\n- G&iacute;a t\\u1ed1t nh\\u1ea5t th\\u1ecb tr\\u01b0\\u1eddng.<br \\/>\\r\\n- Nh\\u1eadn \\u0111\\u1ed5i tr\\u1ea3 h&agrave;ng \\u0111\\u1ed1i v\\u1edbi h&agrave;ng l\\u1ed7i.<br \\/>\\r\\n- Giao h&agrave;ng to&agrave;n qu\\u1ed1c thu ti\\u1ec1n t\\u1ea1i nh&agrave;.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><strong>Hotline: 0975.979.907<br \\/>\\r\\nGiao h&agrave;ng t\\u1eadn nh&agrave;- Tr\\u1ea3 ti\\u1ec1n khi giao- \\u0110\\u1ed5i h&agrave;ng trong v&ograve;ng 7 ng&agrave;y<br \\/>\\r\\nC&ograve;n ng\\u1ea7n ng\\u1ea1i g&igrave;?<\\/strong>&nbsp;H&atilde;y li&ecirc;n h\\u1ec7 \\u0111\\u1eb7t h&agrave;ng ngay h&ocirc;m nay \\u0111\\u1ec3 nh\\u1eadn \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u \\u01b0u \\u0111&atilde;i c\\u1ef1c k&igrave; h\\u1ea5p d\\u1eabn n&agrave;o.<\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"<p><strong>Th&ocirc;ng tin s\\u1ea3n ph\\u1ea9m:<\\/strong><br \\/>\\r\\n- Xu\\u1ea5t x\\u1ee9: h&agrave;ng Qu\\u1ea3ng Ch&acirc;u lo\\u1ea1i 1<br \\/>\\r\\n- Ch\\u1ea5t li\\u1ec7u: &aacute;o phao ch\\u1ea7n b&ocirc;ng si&ecirc;u \\u1ea5m<br \\/>\\r\\n- Kho h&agrave;ng: h&agrave;ng c&oacute; s\\u1eb5n<br \\/>\\r\\n- Ki\\u1ec3u d&aacute;ng: d&aacute;ng ng\\u1eafn ph\\u1ed1i m\\u0169<br \\/>\\r\\n- M&agrave;u s\\u1eafc: h\\u1ed3ng<br \\/>\\r\\n- Size: S,M,L,XL.<\\/p>\\r\\n\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('132', null, null, null, 'Áo Dáng Ngắn H20', 'HH132', 'ao-dang-ngan-h20', 'ao-phao-nu-15.jpg', '1', '1', '0', null, '11', '1', '980000', '550000', '', '', null, '', '', null, null, '0', '0', '36', null, null, null, null, null, '70', '0', null, 'vi', null, '1522312031', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('133', null, null, null, 'Áo Phao Dáng Ngắn H21', 'HH133', 'ao-phao-dang-ngan-h21', 'ao-phao-nu-13.jpg', '1', '1', null, null, '7', '1', '1300000', '860000', '<p><strong>&Aacute;o phao nữ&nbsp;</strong>xuất hiện tự kh&aacute; l&acirc;u v&agrave; c&ugrave;ng với sự ph&aacute;t triển của thời trang m&agrave;&nbsp;<strong>&aacute;o phao nữ</strong>&nbsp;ng&agrave;y c&agrave;ng được biến tấu để gần gũi với xu hướng thời trang hiện đại. Năm nay, c&aacute;c nh&agrave; thiết kế cho ra đời nhiều kiểu&nbsp;<strong>&aacute;o phao nữ</strong>&nbsp;bắt mắt cả về m&agrave;u sắc lẫn thiết kế. Ch&iacute;nh v&igrave; vậy,&nbsp;<strong>Azala</strong>&nbsp;đ&atilde; nhập về 1 số lượng lớn mẫu &aacute;o phao kh&aacute;c nhau để phục vụ nhu cầu mua sắm của kh&aacute;ch h&agrave;ng.</p>\r\n', '', null, '', '', null, null, '0', '0', '36', null, null, null, null, null, '71', '0', null, 'vi', null, '1522463289', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p><strong>&Aacute;o phao n\\u1eef&nbsp;<\\/strong>xu\\u1ea5t hi\\u1ec7n t\\u1ef1 kh&aacute; l&acirc;u v&agrave; c&ugrave;ng v\\u1edbi s\\u1ef1 ph&aacute;t tri\\u1ec3n c\\u1ee7a th\\u1eddi trang m&agrave;&nbsp;<strong>&aacute;o phao n\\u1eef<\\/strong>&nbsp;ng&agrave;y c&agrave;ng \\u0111\\u01b0\\u1ee3c bi\\u1ebfn t\\u1ea5u \\u0111\\u1ec3 g\\u1ea7n g\\u0169i v\\u1edbi xu h\\u01b0\\u1edbng th\\u1eddi trang hi\\u1ec7n \\u0111\\u1ea1i. N\\u0103m nay, c&aacute;c nh&agrave; thi\\u1ebft k\\u1ebf cho ra \\u0111\\u1eddi nhi\\u1ec1u ki\\u1ec3u&nbsp;<strong>&aacute;o phao n\\u1eef<\\/strong>&nbsp;b\\u1eaft m\\u1eaft c\\u1ea3 v\\u1ec1 m&agrave;u s\\u1eafc l\\u1eabn thi\\u1ebft k\\u1ebf. Ch&iacute;nh v&igrave; v\\u1eady,&nbsp;<strong>Azala<\\/strong>&nbsp;\\u0111&atilde; nh\\u1eadp v\\u1ec1 1 s\\u1ed1 l\\u01b0\\u1ee3ng l\\u1edbn m\\u1eabu &aacute;o phao kh&aacute;c nhau \\u0111\\u1ec3 ph\\u1ee5c v\\u1ee5 nhu c\\u1ea7u mua s\\u1eafm c\\u1ee7a kh&aacute;ch h&agrave;ng.<\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<strong>Th&ocirc;ng tin s\\u1ea3n ph\\u1ea9m:<\\/strong><br \\/>\\r\\n- Ngu\\u1ed3n g\\u1ed1c: h&agrave;ng Qu\\u1ea3ng Ch&acirc;u cao c\\u1ea5p<br \\/>\\r\\n- M&agrave;u s\\u1eafc: xanh b\\u1ea1c h&agrave;<br \\/>\\r\\n- Ki\\u1ec3u d&aacute;ng: d&aacute;ng ng\\u1eafn<br \\/>\\r\\n- Kho h&agrave;ng: c&oacute; s\\u1eb5n<br \\/>\\r\\n- Size: S,M,L,XL.<br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/ao%20phao%20ao%20da\\/k235\\/ao%20phao%20dang%20ngan%20co%20mu.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<strong>\\u0110\\u1eb7c \\u0111i\\u1ec3m n\\u1ed5i b\\u1eadt:<\\/strong><br \\/>\\r\\nKi\\u1ec3u&nbsp;<strong>&aacute;o phao n\\u1eef<\\/strong>&nbsp;l\\u1eedng m&agrave;u s\\u1eafc t\\u01b0\\u01a1i s&aacute;ng&nbsp; k\\u1ebft h\\u1ee3p c&ugrave;ng nh\\u1eefng \\u0111\\u01b0\\u1eddng v&acirc;n tr\\u1ebb trung l&agrave; ki\\u1ec3u &aacute;o c\\u1ef1c k\\u1ef3 &ldquo;n\\u1ecbnh&rdquo; d&aacute;ng.<strong>&nbsp;&Aacute;o phao n\\u1eef&nbsp;<\\/strong>d&aacute;ng ng\\u1eafn&nbsp;\\u0111i k&egrave;m v\\u1edbi m\\u0169&nbsp;s\\u1ebd v\\u1eeba gi&uacute;p b\\u1ea1n gi\\u1eefa \\u1ea5m trong nh\\u1eefng ng&agrave;y gi&aacute; l\\u1ea1nh c\\u1ee7a Mi\\u1ec1n B\\u1eafc l\\u1ea1i v\\u1eeba th\\u1ec3 hi\\u1ec7n n&eacute;t duy&ecirc;n d&aacute;ng, trang nh&atilde;&nbsp;c\\u1ee7a m&igrave;nh.&nbsp;<br \\/>\\r\\n<strong>&Aacute;o phao n\\u1eef<\\/strong>&nbsp;r\\u1ea5t d\\u1ec5 m\\u1eb7c, h\\u1ea7u nh\\u01b0 ai c\\u0169ng c&oacute; th\\u1ec3 di\\u1ec7n ch&uacute;ng. \\u0110&acirc;y&nbsp;c\\u0169ng l&agrave; x&igrave;-tai hi\\u1ebfm hoi d&agrave;nh cho c\\u1ea3 nam v&agrave; n\\u1eef, ch&uacute;ng ch\\u1ec9 kh&aacute;c nhau v\\u1ec1 m&agrave;u s\\u1eafc v&agrave; k&iacute;ch c\\u1ee1. V\\u1edbi&nbsp;<strong>&aacute;o phao n\\u1eef<\\/strong>&nbsp;b\\u1ea1n kh&ocirc;ng c\\u1ea7n ph\\u1ea3i qu&aacute; c\\u1ea7u k\\u1ef3 trong vi\\u1ec7c mix \\u0111\\u1ed3, b\\u1ea1n ch\\u1ec9 c\\u1ea7n ch\\u1ecdn x&igrave;-tai y&ecirc;u th&iacute;ch r\\u1ed3i k\\u1ebft h\\u1ee3p ch&uacute;ng c&ugrave;ng jean, legging hay v&aacute;y. V\\u1edbi m\\u1eabu &aacute;o phao c\\u1ee7a Azala ch&uacute;ng t&ocirc;i tin ch\\u1eafc r\\u1eb1ng b\\u1ea1n s\\u1ebd tr&ocirc;ng r\\u1ea5t ho&agrave;n h\\u1ea3o \\u0111\\u1ea5y!<br \\/>\\r\\n<br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/ao%20phao%20ao%20da\\/k235\\/ao%20phao%20dang%20ngan.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<p><strong>G\\u1ee3i &yacute; mix \\u0111\\u1ed3:<\\/strong><br \\/>\\r\\n<strong>Azala<\\/strong>&nbsp;g\\u1ee3i &yacute; cho b\\u1ea1n mix \\u0111\\u1ed3 c\\u1ef1c ch\\u1ea5t v\\u1edbi set \\u0111\\u1ed3&nbsp;<strong>&aacute;o phao n\\u1eef<\\/strong>&nbsp;d&aacute;ng ng\\u1eafn v&agrave; ch&acirc;n v&aacute;y len body d&aacute;ng d&agrave;i. \\u0110&acirc;y l&agrave; set \\u0111\\u1ed3 ho&agrave;n h\\u1ea3o cho nh\\u1eefng c&ocirc; n&agrave;ng m&ecirc; phong c&aacute;ch H&agrave;n Qu\\u1ed1c nh\\u1eefng v\\u1eabn gi\\u1eef nhi\\u1ec7t t\\u1ed1t cho c\\u01a1 th\\u1ec3. \\u0110\\u1ec3 n\\u1ed5i b\\u1eadt v&agrave; c&aacute; t&iacute;nh h\\u01a1n, b\\u1ea1n n&ecirc;n k\\u1ebft h\\u1ee3p c&ugrave;ng v\\u1edbi c&aacute;c ph\\u1ee5 ki\\u1ec7n hay ho.<\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/ao%20phao%20ao%20da\\/k235\\/ao%20phao%20nu%20dang%20ngan.jpg\\\" \\/><br \\/>\\r\\n&Aacute;o phao m&agrave;u xanh mint c\\u1ef1c l\\u1ea1 - hottrend n\\u0103m 2017.<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/ao%20phao%20ao%20da\\/k235\\/ao%20phao%20nu.jpg\\\" \\/><br \\/>\\r\\n&Aacute;o phao ch\\u1ea7n b&ocirc;ng ph\\u1ed1i m\\u0169 si&ecirc;u \\u1ea5m v&agrave; v&ocirc; c&ugrave;ng th\\u1eddi trang.<br \\/>\\r\\n<br \\/>\\r\\n<img alt=\\\"\\\" src=\\\"http:\\/\\/azala.vn\\/upload\\/images\\/ao%20phao%20ao%20da\\/k235\\/ao%20phao.jpg\\\" \\/><br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><strong>Cam k\\u1ebft v\\u1edbi kh&aacute;ch h&agrave;ng:<\\/strong><br \\/>\\r\\n- H&agrave;ng chu\\u1ea9n y h&igrave;nh 100%.<br \\/>\\r\\n- G&iacute;a t\\u1ed1t nh\\u1ea5t th\\u1ecb tr\\u01b0\\u1eddng.<br \\/>\\r\\n- Nh\\u1eadn \\u0111\\u1ed5i tr\\u1ea3 h&agrave;ng \\u0111\\u1ed1i v\\u1edbi h&agrave;ng l\\u1ed7i.<br \\/>\\r\\n- Giao h&agrave;ng to&agrave;n qu\\u1ed1c thu ti\\u1ec1n t\\u1ea1i nh&agrave;.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><strong>Hotline: 0975.979.907<br \\/>\\r\\nGiao h&agrave;ng t\\u1eadn nh&agrave;- Tr\\u1ea3 ti\\u1ec1n khi giao- \\u0110\\u1ed5i h&agrave;ng trong v&ograve;ng 7 ng&agrave;y<br \\/>\\r\\nC&ograve;n ng\\u1ea7n ng\\u1ea1i g&igrave;?<\\/strong>&nbsp;H&atilde;y li&ecirc;n h\\u1ec7 \\u0111\\u1eb7t h&agrave;ng ngay h&ocirc;m nay \\u0111\\u1ec3 nh\\u1eadn \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u \\u01b0u \\u0111&atilde;i c\\u1ef1c k&igrave; h\\u1ea5p d\\u1eabn n&agrave;o.<\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('134', null, null, null, 'Áo Phao Dáng Ngắn H22', 'HH134', 'ao-phao-dang-ngan-h22', 'ao-phao-nu-17.jpg', '1', '1', null, null, '8', '1', '1300000', '860000', '', '', null, '', '', null, null, '0', '0', '36', null, null, null, null, null, '72', '0', null, 'vi', null, '1522464776', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('124', null, null, null, 'Áo Lông Cừu H11', 'HH124', 'ao-long-cuu-h11', 'ao-long-01.jpg', '1', '1', null, null, '3', '1', '780000', '620000', '', '', null, '', '', null, null, '0', '0', '35', null, null, null, null, null, '62', '0', null, 'vi', null, '1522311416', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('125', null, null, null, 'Áo Lông Vũ H12', 'HH125', 'ao-long-vu-h12', 'ao-long-02.jpg', '1', '1', null, null, '4', '1', '1500000', '1050000', '', '', null, '', '', null, null, '0', '0', '35', null, null, null, null, null, '63', '0', null, 'vi', null, '1522311480', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('119', null, null, null, 'Đồ ngủ nữ H27', 'HH119', 'do-ngu-nu-h27', 'bo-do-nu-27.JPG', '1', '1', '0', null, '5', '1', '250000', '200000', '', '', null, '', '', null, null, '0', '0', '34', null, null, null, null, null, '57', '0', null, 'vi', null, '1522310237', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('120', null, null, null, 'Bộ Ngủ Nữ H23', 'HH120', 'bo-ngu-nu-h23', 'do-nu-chat-thun-mat.jpg', '1', '1', '0', null, '6', '1', '290000', '250000', '', '', null, '', '', null, null, '0', '0', '34', null, null, null, null, null, '58', '0', null, 'vi', null, '1522310265', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('121', null, null, null, 'Bộ Ngủ Nữ H24', 'HH121', 'bo-ngu-nu-h24', 'do-nu-48.jpg', '1', '1', '0', null, '8', '1', '280000', '230000', '', '', null, '', '', null, null, '0', '0', '34', null, null, null, null, null, '59', '0', null, 'vi', null, '1522310257', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('122', null, null, null, 'Bộ Ngủ Nữ H13', 'HH122', 'bo-ngu-nu-h13', 'bo-ngu-h12.jpg', '1', '1', '0', null, '8', '1', '300000', '250000', '', '', null, '', '', null, null, '0', '0', '34', null, null, null, null, null, '60', '0', null, 'vi', null, '1522310284', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('123', null, null, null, 'Bộ Ngủ Nữ H26', 'HH123', 'bo-ngu-nu-h26', 'bo-ngu-h13.jpg', '1', '1', '0', null, '11', '1', '280000', '240000', '', '', null, '', '', null, null, '0', '0', '34', null, null, null, null, null, '61', '0', null, 'vi', null, '1522310165', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('140', null, null, null, 'Quần short Jeans-B2820', 'HH140', 'quan-short-jeans-b2820', 'quan-short-jeans-b2820.jpg', '1', '1', '0', null, '2', '1', '290000', '220000', '', '', null, '', '', null, null, '0', '0', '41', null, null, null, null, null, '78', '0', null, 'vi', null, '1522314322', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('148', null, null, null, 'Áo ngực T-shirt Anny', 'HH148', 'ao-nguc-t-shirt-anny', '3.jpg', '1', '1', '1', null, '12', '1', '300000', '180000', '<p>&Aacute;o ngực T-shirt Anny được may từ chất liệu valise trơn b&oacute;ng mang lại cảm gi&aacute;c sang trọng cho người mặc. Với kiểu d&aacute;ng c&uacute;p x&eacute;o c&ugrave;ng đệm m&uacute;t &ocirc;m trọn bầu ngưc, sản phẩm gi&uacute;p t&ocirc;n l&ecirc;n&nbsp;</p>\r\n', '', null, '', '', null, null, '0', '0', '53', null, null, null, null, null, '86', '0', null, 'vi', null, '1522467723', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/3%20ao-lot-nu-2.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/3.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/3%20ao-lot-nu-1.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('149', null, null, null, 'Áo lót hè vui tươi', 'HH149', 'ao-lot-he-vui-tuoi', '4.jpg', '1', '1', '1', null, '26', '1', '195000', '140000', '<p>M&ugrave;a h&egrave; tươi vui v&agrave; năng động đ&acirc;u thể thiếu được những chiếc &aacute;o nịt ngực m&ugrave;a h&egrave; m&agrave;u sắc vui tươi. D&ugrave; trẻ hay trung ni&ecirc;n đừng ngần ngại sắm cho m&igrave;nh v&agrave;i chiếc &aacute;o nịt ngực mang đậm sắc&nbsp;</p>\r\n', '', null, '', '', null, null, '0', '0', '53', null, null, null, null, null, '87', '0', null, 'vi', null, '1522467597', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/4.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/4%20ao-lot-nu-2.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/4%20ao-lot-nu-3.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('150', null, null, null, 'Sexy Bralette Hồng ren cá tính ', 'HH150', 'sexy-bralette-hong-ren-ca-tinh', '5.jpg', '1', '1', null, null, '29', '1', '200000', '150000', '<p>&Aacute;o l&oacute;t n&acirc;ng ngực tạo khe họa tiết da beo l&agrave; chiếc &aacute;o kh&ocirc;ng thể thiếu trong tủ &aacute;o của bạn g&aacute;i. M&ugrave;a h&egrave; tươi vui v&agrave; năng động đ&acirc;u thể thiếu được những chiếc &aacute;o nịt ngực m&ugrave;a h&egrave; m&agrave;u sắc vui tươi</p>\r\n', '', null, '', '', null, null, '0', '0', '53', null, null, null, null, null, '88', '0', null, 'vi', null, '1522467363', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/5%20ao-ren-nu-1.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/5%20ao-ren-nu-2.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/5%20ao-ren-nu-3.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('151', null, null, null, 'Áo lót nâng ngực sexy', 'HH151', 'ao-lot-nang-nguc-sexy', '7.jpg', '1', '1', null, null, '20', '1', '220000', '185000', '<p>&Aacute;o l&aacute; ren thiết kế dạng &aacute;o croptop &ocirc;m s&aacute;t, c&oacute; m&uacute;t nhẹ phần ngực. - Chất thun ren d&agrave;y, c&oacute; độ co d&atilde;n đ&agrave;n hồi vừa phải. - Thiết kể V cổ s&acirc;u, gợi cảm dịu d&agrave;ng, phần lưng ren xuy&ecirc;n suốt sexy. -&nbsp;</p>\r\n', '', null, '', '', null, null, '0', '0', '53', null, null, null, null, null, '89', '0', null, 'vi', null, '1522466891', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p>&Aacute;o l&aacute; ren thi\\u1ebft k\\u1ebf d\\u1ea1ng &aacute;o croptop &ocirc;m s&aacute;t, c&oacute; m&uacute;t nh\\u1eb9 ph\\u1ea7n ng\\u1ef1c. - Ch\\u1ea5t thun ren d&agrave;y, c&oacute; \\u0111\\u1ed9 co d&atilde;n \\u0111&agrave;n h\\u1ed3i v\\u1eeba ph\\u1ea3i. - Thi\\u1ebft k\\u1ec3 V c\\u1ed5 s&acirc;u, g\\u1ee3i c\\u1ea3m d\\u1ecbu d&agrave;ng, ph\\u1ea7n l\\u01b0ng ren xuy&ecirc;n su\\u1ed1t sexy.&nbsp;<\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/7%20ao-ren-nu-1.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/7%20ao-ren-nu-2.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/7.jpg\\\" style=\\\"height:984px; width:725px\\\" \\/><\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('152', null, null, null, 'Áo phông chữ ', 'HH152', 'ao-phong-chu', 'ao-phong-den-chuu.jpg', '1', '1', '0', null, '6', '1', '250000', '150000', '', '', null, '', '', null, null, '0', '0', '54', null, null, null, null, null, '90', '0', null, 'vi', null, '1522320384', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('153', null, null, null, 'Áo phông đen ', 'HH153', 'ao-phong-den', 'ao-phong-den.jpg', '1', '1', '0', null, '4', '1', '220000', '160000', '', '', null, '', '', null, null, '0', '0', '54', null, null, null, null, null, '91', '0', null, 'vi', null, '1522320376', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('154', null, null, null, 'Ao phông chữ màu ', 'HH154', 'ao-phong-chu-mau', 'ao-phong-hiinh.jpg', '1', '1', '0', null, '4', '1', '195000', '140000', '', '', null, '', '', null, null, '0', '0', '54', null, null, null, null, null, '92', '0', null, 'vi', null, '1522320370', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('155', null, null, null, 'Áo phông trơn ', 'HH155', 'ao-phong-tron', 'ao-phong-tron.jpg', '1', '1', '0', null, '4', '1', '160000', '120000', '', '', null, '', '', null, null, '0', '0', '54', null, null, null, null, null, '93', '0', null, 'vi', null, '1522320361', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('156', null, null, null, 'Áo phông cách điệu ', 'HH156', 'ao-phong-cach-dieu', 'ao-phong-dai.jpg', '1', '1', '0', null, '5', '1', '250000', '140000', '', '', null, '', '', null, null, '0', '0', '54', null, null, null, null, null, '94', '0', null, 'vi', null, '1522320427', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('157', null, null, null, 'Bộ bồ ngủ H28', 'HH157', 'bo-bo-ngu-h28', 'do-nxuw-23-2.jpg', '1', '1', '0', null, '4', '1', '250000', '185000', '<p>T&ecirc;n Sản Phẩm Đầm noel đu&ocirc;i c&aacute; Chất Liệu C&aacute;t H&agrave;n M&agrave;u Sắc Đỏ Size + size M: Chiều d&agrave;i đầm: 85cm, Ngực 80-84cm, Eo 68-72cm, M&ocirc;ng 88-92cm + size L: Chiều d&agrave;i đầm: 86cm, Ngực 84-88cm, Eo 72-76cm, M&ocirc;ng 92-96cm + size XL: Chiều d&agrave;i đầm: 87cm, Ngực 88-92cm, Eo 76-80cm, M&ocirc;ng 96-100cm Kiểu D&aacute;ng Đầm đu&ocirc;i c&aacute; noel ...</p>\r\n', '', null, '', '', null, null, '0', '0', '34', null, null, null, null, null, '95', '0', null, 'vi', null, '1522376854', '', '29032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<table>\\r\\n\\t<tbody>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td>T&ecirc;n S\\u1ea3n Ph\\u1ea9m<\\/td>\\r\\n\\t\\t\\t<td>\\u0110\\u1ea7m noel \\u0111u&ocirc;i c&aacute;<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td>Ch\\u1ea5t Li\\u1ec7u<\\/td>\\r\\n\\t\\t\\t<td>C&aacute;t H&agrave;n<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td>M&agrave;u S\\u1eafc<\\/td>\\r\\n\\t\\t\\t<td>\\u0110\\u1ecf<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td>Size<\\/td>\\r\\n\\t\\t\\t<td>+ size M: Chi\\u1ec1u d&agrave;i \\u0111\\u1ea7m: 85cm, Ng\\u1ef1c 80-84cm, Eo 68-72cm, M&ocirc;ng 88-92cm<br \\/>\\r\\n\\t\\t\\t+ size L: Chi\\u1ec1u d&agrave;i \\u0111\\u1ea7m: 86cm, Ng\\u1ef1c 84-88cm, Eo 72-76cm, M&ocirc;ng 92-96cm<br \\/>\\r\\n\\t\\t\\t+ size XL: Chi\\u1ec1u d&agrave;i \\u0111\\u1ea7m: 87cm, Ng\\u1ef1c 88-92cm, Eo 76-80cm, M&ocirc;ng 96-100cm<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td>Ki\\u1ec3u D&aacute;ng<\\/td>\\r\\n\\t\\t\\t<td>\\u0110\\u1ea7m \\u0111u&ocirc;i c&aacute; noel<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t<\\/tbody>\\r\\n<\\/table>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('158', null, null, null, 'Chân Váy Đỏ Cúc H01', 'HH158', 'chan-vay-do-cuc-h01', 'chan-vay-do.jpg', '1', '1', '0', null, '6', '1', '280000', '220000', '', '', null, '', '', null, null, '0', '0', '55', null, null, null, null, null, '96', '0', null, 'vi', null, '1522374933', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('159', null, null, null, 'Chân Váy Đen H02', 'HH159', 'chan-vay-den-h02', 'chan-vay-1.jpg', '1', '1', '0', null, '3', '1', '250000', '180000', '', '', null, '', '', null, null, '0', '0', '55', null, null, null, null, null, '97', '0', null, 'vi', null, '1522374922', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('160', null, null, null, 'Chân Váy Hồng Dai h03', 'HH160', 'chan-vay-hong-dai-h03', 'chan-vay-hong.jpg', '1', '1', '0', null, '3', '1', '320000', '250000', '', '', null, '', '', null, null, '0', '0', '55', null, null, null, null, null, '98', '0', null, 'vi', null, '1522374972', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('161', null, null, null, 'Chân Váy Ngắn Xòe H04', 'HH161', 'chan-vay-ngan-xoe-h04', 'chan-vay-ngan.jpg', '1', '1', '0', null, '2', '1', '350000', '280000', '', '', null, '', '', null, null, '0', '0', '55', null, null, null, null, null, '99', '0', null, 'vi', null, '1522375017', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('162', null, null, null, 'Chân Váy Xòe Xếp Li H05', 'HH162', 'chan-vay-xoe-xep-li-h05', 'chan-vay-xoe.jpg', '1', '1', '0', null, '3', '1', '380000', '320000', '', '', null, '', '', null, null, '0', '0', '55', null, null, null, null, null, '100', '0', null, 'vi', null, '1522375061', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('163', null, null, null, 'Chân Váy Xòe Trơn H06', 'HH163', 'chan-vay-xoe-tron-h06', 'vay-depx-oe.jpg', '1', '1', '0', null, '5', '1', '420000', '320000', '', '', null, '', '', null, null, '0', '0', '55', null, null, null, null, null, '101', '0', null, 'vi', null, '1522375197', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('164', null, null, null, 'Chân Váy Trắng H07', 'HH164', 'chan-vay-trang-h07', 'vay-trang.jpg', '1', '1', '0', null, '5', '1', '420000', '360000', '', '', null, '', '', null, null, '0', '0', '55', null, null, null, null, null, '102', '0', null, 'vi', null, '1522375139', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('180', null, null, null, 'Áo len L01', 'HH180', 'ao-len-l01', 'ao-len-1.jpg', '1', '1', null, null, '4', '1', '360000', '250000', '', '', null, '', '', null, null, '0', '0', '56', null, null, null, null, null, '116', '0', null, 'vi', null, '1522377805', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('165', null, null, null, 'Áo Lông Cừu H16', 'HH165', 'ao-long-cuu-h16', 'ao-long-10.JPG', '1', '1', '0', null, '6', '1', '1050000', '850000', '', '', null, '', '', null, null, '0', '0', '35', null, null, null, null, null, '103', '0', null, 'vi', null, '1522375279', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('166', null, null, null, 'Áo Lông Cừu H17', 'HH166', 'ao-long-cuu-h17', 'ao-long-08.jpg', '1', '1', null, null, '5', '1', '980000', '720000', '', '', null, '', '', null, null, '0', '0', '35', null, null, null, null, null, '104', '0', null, 'vi', null, '1522375397', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('167', null, null, null, 'Áo Lông Vũ H18', 'HH167', 'ao-long-vu-h18', 'ao-long-04jpg.jpg', '1', '1', null, null, '5', '1', '980000', '850000', '', '', null, '', '', null, null, '0', '0', '35', null, null, null, null, null, '105', '0', null, 'vi', null, '1522375452', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('175', null, null, null, 'Váy maxi Hoa M02', 'HH175', 'vay-maxi-hoa-m02', 'maxi-2.jpg', '1', '1', '1', null, '19', '1', '550000', '400000', '', '', null, '', '', null, null, '0', '0', '49', null, null, null, null, null, '111', '0', null, 'vi', null, '1522377196', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('174', null, null, null, 'Váy maxi M01', 'HH174', 'vay-maxi-m01', 'maxi-1.jpg', '1', '1', '0', null, '8', '1', '360000', '250000', '', '', null, '', '', null, null, '0', '0', '49', null, null, null, null, null, '110', '0', null, 'vi', null, '1522376952', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('170', null, null, null, 'Đồ ngủ H28', 'HH170', 'do-ngu-h28', 'bo-ngu-h22.jpg', '1', '1', null, null, '4', '1', '250000', '185000', '', '', null, '', '', null, null, '0', '0', '34', null, null, null, null, null, '108', '0', null, 'vi', null, '1522376641', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('171', null, null, null, 'Đồ Ngủ H29', 'HH171', 'do-ngu-h29', 'bo-ngu-h14.jpg', '1', '1', null, null, '4', '1', '280000', '185000', '', '', null, '', '', null, null, '0', '0', '34', null, null, null, null, null, '109', '0', null, 'vi', null, '1522469556', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/1-bo-do-ngu-2(1).jpg\\\" style=\\\"height:849px; width:650px\\\" \\/><\\/p>\\r\\n\\r\\n<p><img alt=\\\"\\\" src=\\\"\\/upload\\/images\\/1-bo-do-ngu-1(1).jpg\\\" style=\\\"height:850px; width:650px\\\" \\/><\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('176', null, null, null, 'Váy maxi Hoa M03', 'HH176', 'vay-maxi-hoa-m03', 'maxi-3.jpg', '1', '1', '1', null, '15', '1', '580000', '450000', '', '', null, '', '', null, null, '0', '0', '49', null, null, null, null, null, '112', '0', null, 'vi', null, '1522377044', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('177', null, null, null, 'Váy maxi màu M04', 'HH177', 'vay-maxi-mau-m04', 'maxi-4.jpg', '1', '1', '0', null, '6', '1', '650000', '450000', '', '', null, '', '', null, null, '0', '0', '49', null, null, null, null, null, '113', '0', null, 'vi', null, '1522377094', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('178', null, null, null, 'Váy maxi vải von M05', 'HH178', 'vay-maxi-vai-von-m05', 'maxi-5.jpg', '1', '1', '1', null, '17', '1', '750000', '450000', '', '', null, '', '', null, null, '0', '0', '49', null, null, null, null, null, '114', '0', null, 'vi', null, '1522377143', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('179', null, null, null, 'Váy maxi Trắng M06', 'HH179', 'vay-maxi-trang-m06', 'maxi-6.jpg', '1', '1', '1', null, '23', '1', '680000', '550000', '', '', null, '', '', null, null, '0', '0', '49', null, null, null, null, null, '115', '0', null, 'vi', null, '1522377176', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('181', null, null, null, 'Áo Len L02', 'HH181', 'ao-len-l02', 'ao-len-2.jpg', '1', '1', null, null, '6', '1', '250000', '185000', '', '', null, '', '', null, null, '0', '0', '56', null, null, null, null, null, '117', '0', null, 'vi', null, '1522377841', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', null);
INSERT INTO `product` VALUES ('182', null, null, null, 'Áo Len L03', 'HH182', 'ao-len-l03', 'ao-len-3.jpg', '1', '1', null, null, '4', '1', '360000', '200000', '', '', null, '', '', null, null, '0', '0', '56', null, null, null, null, null, '118', '20', null, 'vi', null, '1522377873', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', '100000');
INSERT INTO `product` VALUES ('183', null, null, null, 'Áo Len L04', 'HH183', 'ao-len-l04', 'ao-len-4.jpg', '1', '1', null, null, '3', '1', '420000', '350000', '', '', null, '', '', null, null, '0', '0', '56', null, null, null, null, null, '119', '45', null, 'vi', null, '1522377906', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', '100000');
INSERT INTO `product` VALUES ('184', null, null, null, 'Áo Len L05', 'HH184', 'ao-len-l05', 'ao-len-5.jpg', '1', '1', null, null, '4', '0', '550000', '350000', '', '', null, '', '', null, null, '0', '0', '56', null, null, null, null, null, '120', '10', null, 'vi', null, '1522377938', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', '2000000');
INSERT INTO `product` VALUES ('185', null, null, null, 'Áo Len L06', 'HH185', 'ao-len-l06', 'ao-len-6.jpg', '1', '1', null, null, '6', '0', '650000', '400000', '', '', null, '', '', null, null, '0', '0', '56', null, null, null, null, null, '121', '8', null, 'vi', null, '1522377994', '', '30032018', null, null, '1', null, null, null, null, null, '2', null, '0', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"H\\u01b0\\u1edbng d\\u1eabn mua h\\u00e0ng\",\"type\":\"int\",\"sort\":\"3\"}]', '', '500000');
INSERT INTO `product` VALUES ('186', null, null, null, 'Áo Len L07', 'HH186', 'ao-len-l07', 'ao-len-7.jpg', '1', '1', '1', '1', '9', '0', '550000', '450000', '<p>th&ocirc;ng tin sản phẩm</p>\r\n', '', null, '', '', null, null, '0', '0', '56', null, null, null, null, null, '122', '31', null, 'vi', null, '1523066764', '', '30032018', null, null, '1', null, null, null, '4', '4', '1', null, '0', '[{\"content\":\"<p>chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m<\\/p>\\r\\n\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"<p>th&ocirc;ng s\\u1ed1 k\\u1ef9 thu\\u1eadt<\\/p>\\r\\n\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"M\\u00e3 s\\u1ea3n ph\\u1ea9m\",\"type\":\"text\",\"sort\":\"\"}]', '', '100000');

-- ----------------------------
-- Table structure for product_brand
-- ----------------------------
DROP TABLE IF EXISTS `product_brand`;
CREATE TABLE `product_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `women` tinyint(1) DEFAULT NULL,
  `men` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `title_seo` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `description_seo` text CHARACTER SET utf8,
  `keyword` text CHARACTER SET utf8,
  `sort` int(11) DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '1',
  `view` tinyint(1) DEFAULT NULL,
  `home` tinyint(1) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_brand
-- ----------------------------
INSERT INTO `product_brand` VALUES ('10', null, 'Chanel', 'upload/img/tải_xuống_(1).png', 'chanel', '', '0', '1', '0', null, null, null, '1', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('11', null, 'puma', 'upload/img/images_(13).jpg', 'puma', '', null, null, '1', null, null, null, '16', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('13', null, 'Lanvin', 'upload/img/th17.png', 'lanvin', '', '0', '0', '0', null, null, null, '4', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('14', null, 'H&M', 'upload/img/tải_xuống_(2).png', 'hm', '', '0', '1', '0', null, null, null, '5', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('15', null, 'Nike', 'upload/img/tải_xuống_(1).jpg', 'nike', '', '0', '0', '1', null, null, null, '6', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('20', null, 'Valentino', 'upload/img/tải_xuống_(6).png', 'valentino', '', '0', '0', '0', null, null, null, '7', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('21', null, 'Zaza', 'upload/img/tải_xuống_(4).png', 'zaza', '', '0', '0', '0', null, null, null, '8', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('22', null, 'Gucci', 'upload/img/images_(4).jpg', 'gucci', '', null, null, null, null, null, null, '15', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('23', null, 'Armani', 'upload/img/th4.png', 'armani', '', '0', '0', '0', null, null, null, '1', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('24', null, 'Bebe', 'upload/img/8307969_orig.jpg', 'bebe', '', '0', '0', '0', null, null, null, '11', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('32', null, 'Dior', 'upload/img/images_(14).jpg', 'dior', '', '0', '0', '0', null, null, null, '12', 'vi', '1', null, null, null);
INSERT INTO `product_brand` VALUES ('33', null, 'Mango', 'upload/img/th7.png', 'mango', '', null, null, null, null, null, null, '14', 'vi', '1', null, null, null);

-- ----------------------------
-- Table structure for product_category
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `title_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `keyword_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_seo` text CHARACTER SET utf8,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `home` tinyint(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  `coupon` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT '1',
  `gender` tinyint(1) DEFAULT NULL,
  `banner` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO `product_category` VALUES ('26', null, 'danh mục 1', '', null, '', null, 'danh-muc-1', '0', '', null, '16', null, null, null, 'en', null, null);
INSERT INTO `product_category` VALUES ('27', null, 'Váy Xòe Nữ ', '', null, '', 'upload/img/category/qts-banner-ads-4.png', 'vay-xoe-nu', '0', '', '0', '11', '1', null, '1', 'vi', null, null);
INSERT INTO `product_category` VALUES ('28', null, 'Áo Phao', '', null, '', 'upload/img/category/qts-banner-ads-2.png', 'ao-phao', '0', '', '1', '1', '0', null, '1', 'vi', null, null);
INSERT INTO `product_category` VALUES ('29', null, 'Áo Lông', '', null, '', 'upload/img/category/qts-banner-ads-21.png', 'ao-long', '0', '', '0', '2', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('52', null, 'Áo Lót', '', null, '', 'upload/img/category/2.jpg', 'ao-lot', '0', '', '1', '10', null, null, null, 'vi', null, null);
INSERT INTO `product_category` VALUES ('34', null, 'Bộ Đồ Ngủ Nữ ', '', null, '', null, 'bo-do-ngu-nu', '33', '', '1', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('38', null, 'Quần JEANS ', '', null, '', null, 'quan-jeans1', '38', '', '1', '25', '1', null, '1', 'vi', null, null);
INSERT INTO `product_category` VALUES ('33', null, 'Bộ Đồ Ngủ ', '', null, '', 'upload/img/category/qts-banner-ads-1.png', 'bo-do-ngu', '0', '', '1', '2', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('35', null, 'Áo Lông Nữ', '', null, '', null, 'ao-long-nu', '29', '', '1', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('36', null, 'Áo Phao Nữ', '', null, '', null, 'ao-phao-nu', '28', '', '1', '0', '0', null, '1', 'vi', null, null);
INSERT INTO `product_category` VALUES ('37', null, 'Váy Nữ ', '', null, '', null, 'vay-nu', '27', '', '0', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('39', null, 'Quần JEANS ', '', null, '', null, 'quan-jeans', '38', '', null, '26', null, null, null, 'vi', null, null);
INSERT INTO `product_category` VALUES ('40', null, 'Quần Jeans', '', null, '', null, 'quan-jeans-1', '0', '', null, '4', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('42', null, 'Quần JEANS đùi', '', null, '', null, 'quan-jeans-dui', '40', '', null, '0', null, null, null, 'vi', null, null);
INSERT INTO `product_category` VALUES ('47', null, 'Áo phông', '', null, '', null, 'ao-phong', '0', '', null, '6', null, null, null, 'vi', null, null);
INSERT INTO `product_category` VALUES ('48', null, 'Maxi', '', null, '', 'upload/img/category/maxi-1.jpg', 'maxi', '0', '', '1', '7', '0', null, null, 'vi', null, null);
INSERT INTO `product_category` VALUES ('45', null, 'Váy Yếm ', '', null, '', null, 'vay-yem', '0', '', '0', '5', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('46', null, 'Váy Yếm Jeans', '', null, '', null, 'vay-yem-jeans', '45', '', '1', '0', null, null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('49', null, 'Váy maxi', '', null, '', '', 'vay-maxi', '48', '', '1', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('50', null, 'Áo len ', '', null, '', null, 'ao-len', '0', '', '0', '8', '0', null, null, 'vi', null, null);
INSERT INTO `product_category` VALUES ('51', null, 'Chân váy', '', null, '', 'upload/img/category/chan-vay-ngan.jpg', 'chan-vay', '0', '', '0', '9', null, null, null, 'vi', null, null);
INSERT INTO `product_category` VALUES ('53', null, 'Áo Lót Ngực', '', null, '', '', 'ao-lot-nguc', '52', '', '1', '0', null, null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('54', null, 'Áo phông nữ ', '', null, '', 'upload/img/category/ao-phong-dai.jpg', 'ao-phong-nu', '47', '', '1', '0', '0', null, '0', 'vi', null, null);
INSERT INTO `product_category` VALUES ('55', null, 'Chân Váy Công Sở', '', null, '', '', 'chan-vay-cong-so', '51', '', '1', '0', null, null, null, 'vi', null, null);
INSERT INTO `product_category` VALUES ('56', null, 'Áo Len Nữ', '', null, '', '', 'ao-len-nu', '50', '', '1', '0', '0', null, '0', 'vi', null, null);

-- ----------------------------
-- Table structure for product_color
-- ----------------------------
DROP TABLE IF EXISTS `product_color`;
CREATE TABLE `product_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_color
-- ----------------------------
INSERT INTO `product_color` VALUES ('2', '#31859b', 'Màu xanh lam', 'màu xanh lam', 'vi', null, '3', null);
INSERT INTO `product_color` VALUES ('3', '#000000', 'Màu đen', 'màu đen', 'vi', null, '4', null);
INSERT INTO `product_color` VALUES ('4', '#ff0000', 'Màu đỏ', 'màu đỏ', 'vi', null, '5', null);
INSERT INTO `product_color` VALUES ('5', '#7030a0', 'Màu tím', 'màu tím', 'vi', null, '6', null);
INSERT INTO `product_color` VALUES ('6', '#f79646', 'Màu cam', 'màu cam', 'vi', null, '7', null);
INSERT INTO `product_color` VALUES ('7', '#ffffff', 'Màu Trắng', 'màu trắng', 'vi', null, '8', null);
INSERT INTO `product_color` VALUES ('8', '#d99694', 'màu hồng', '', 'vi', null, '9', null);
INSERT INTO `product_color` VALUES ('9', '#7f7f7f', 'màu ghi', 'màu ghi', 'vi', null, '10', null);
INSERT INTO `product_color` VALUES ('10', '#ffc000', 'màu ánh vàng', 'màu ánh vàng', 'vi', null, '11', null);
INSERT INTO `product_color` VALUES ('11', '#974806', 'màu nâu', 'màu nâu', 'vi', null, '12', null);
INSERT INTO `product_color` VALUES ('12', '#4f6128', 'màu xanh xám', 'màu xanh xám', 'vi', null, '13', null);
INSERT INTO `product_color` VALUES ('13', '#d8d8d8', 'Màu ánh bạc', 'màu ánh bạc', 'vi', null, '14', null);
INSERT INTO `product_color` VALUES ('16', '#5f497a', 'tím', '', 'vi', null, '15', null);
INSERT INTO `product_color` VALUES ('17', '#fdeada', 'Màu nude', '<p>m&agrave;u nude</p>\r\n', 'vi', null, '2', null);

-- ----------------------------
-- Table structure for product_img
-- ----------------------------
DROP TABLE IF EXISTS `product_img`;
CREATE TABLE `product_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `multi_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img_dir` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_color` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_img
-- ----------------------------

-- ----------------------------
-- Table structure for product_locale
-- ----------------------------
DROP TABLE IF EXISTS `product_locale`;
CREATE TABLE `product_locale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `sort` tinyint(1) DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_locale
-- ----------------------------
INSERT INTO `product_locale` VALUES ('4', 'Ấn Độ', null, '2', '', 'vi', 'an-do', null, null, null, null);
INSERT INTO `product_locale` VALUES ('5', 'Thái Lan', null, '3', '', 'vi', 'thai-lan', null, null, null, null);
INSERT INTO `product_locale` VALUES ('6', 'Đài Loan', null, '4', '', 'vi', 'dai-loan', null, null, null, null);
INSERT INTO `product_locale` VALUES ('7', 'Trung Quốc', null, '5', '', 'vi', 'trung-quoc', null, null, null, null);
INSERT INTO `product_locale` VALUES ('8', 'Anh', null, '6', '', 'vi', 'anh', null, null, null, null);
INSERT INTO `product_locale` VALUES ('9', 'Pháp', null, '7', '', 'vi', 'phap', null, null, null, null);
INSERT INTO `product_locale` VALUES ('10', 'Mỹ', null, '8', '', 'vi', 'my', null, null, null, null);
INSERT INTO `product_locale` VALUES ('11', 'Nhật', null, '10', '', 'vi', 'nhat', null, null, null, null);

-- ----------------------------
-- Table structure for product_old
-- ----------------------------
DROP TABLE IF EXISTS `product_old`;
CREATE TABLE `product_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `focus` tinyint(1) NOT NULL,
  `coupon` tinyint(1) NOT NULL,
  `mostview` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `description_seo` text COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  `origin` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `color` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `size` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `caption_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_old
-- ----------------------------

-- ----------------------------
-- Table structure for product_price
-- ----------------------------
DROP TABLE IF EXISTS `product_price`;
CREATE TABLE `product_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `from_price` int(11) DEFAULT NULL,
  `to_price` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `lang` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_price
-- ----------------------------
INSERT INTO `product_price` VALUES ('1', 'Dưới 100.000 đ', '0', '100000', '1', 'vi');
INSERT INTO `product_price` VALUES ('3', '200.000 - 400.000 đ', '200000', '400000', '2', 'vi');
INSERT INTO `product_price` VALUES ('4', '400.000 - 500.000 đ', '400000', '500000', '3', 'vi');
INSERT INTO `product_price` VALUES ('5', '500.000 - 1000.000 đ', '500000', '1000000', '4', 'vi');
INSERT INTO `product_price` VALUES ('6', '1000000 - 2000000đ', '1000000', '2000000', '5', 'vi');
INSERT INTO `product_price` VALUES ('9', 'Trên 2000000đ', '2000000', '3000000', '6', 'vi');

-- ----------------------------
-- Table structure for product_size
-- ----------------------------
DROP TABLE IF EXISTS `product_size`;
CREATE TABLE `product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `size` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sort` int(11) NOT NULL,
  `lang` varchar(100) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_size
-- ----------------------------
INSERT INTO `product_size` VALUES ('1', 'XL', '', '15', 'vi', null);
INSERT INTO `product_size` VALUES ('2', 'M', '', '13', 'vi', null);
INSERT INTO `product_size` VALUES ('3', 'XS', '', '12', 'vi', null);
INSERT INTO `product_size` VALUES ('4', 'L', '', '14', 'vi', null);
INSERT INTO `product_size` VALUES ('5', 'S', '', '11', 'vi', null);
INSERT INTO `product_size` VALUES ('6', 'XXL', '', '16', 'vi', null);
INSERT INTO `product_size` VALUES ('7', '34', '', '1', 'vi', null);
INSERT INTO `product_size` VALUES ('8', '35', '', '2', 'vi', null);
INSERT INTO `product_size` VALUES ('9', '36', '', '3', 'vi', null);
INSERT INTO `product_size` VALUES ('10', '37', '', '4', 'vi', null);
INSERT INTO `product_size` VALUES ('11', '38', '', '5', 'vi', null);
INSERT INTO `product_size` VALUES ('12', '39', '', '6', 'vi', null);

-- ----------------------------
-- Table structure for product_tag
-- ----------------------------
DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag` (
  `product_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `lang` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tag` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `alias` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`product_tag_id`) USING BTREE,
  KEY `product_id` (`product_id`) USING BTREE,
  KEY `language_id` (`lang`) USING BTREE,
  KEY `tag` (`tag`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_tag
-- ----------------------------

-- ----------------------------
-- Table structure for product_to_brand
-- ----------------------------
DROP TABLE IF EXISTS `product_to_brand`;
CREATE TABLE `product_to_brand` (
  `brand_id` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of product_to_brand
-- ----------------------------

-- ----------------------------
-- Table structure for product_to_category
-- ----------------------------
DROP TABLE IF EXISTS `product_to_category`;
CREATE TABLE `product_to_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=590 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of product_to_category
-- ----------------------------
INSERT INTO `product_to_category` VALUES ('360', '119', '34');
INSERT INTO `product_to_category` VALUES ('376', '112', '37');
INSERT INTO `product_to_category` VALUES ('369', '113', '27');
INSERT INTO `product_to_category` VALUES ('371', '114', '27');
INSERT INTO `product_to_category` VALUES ('383', '125', '29');
INSERT INTO `product_to_category` VALUES ('382', '124', '35');
INSERT INTO `product_to_category` VALUES ('359', '119', '33');
INSERT INTO `product_to_category` VALUES ('364', '120', '34');
INSERT INTO `product_to_category` VALUES ('363', '120', '33');
INSERT INTO `product_to_category` VALUES ('362', '121', '34');
INSERT INTO `product_to_category` VALUES ('361', '121', '33');
INSERT INTO `product_to_category` VALUES ('366', '122', '34');
INSERT INTO `product_to_category` VALUES ('365', '122', '33');
INSERT INTO `product_to_category` VALUES ('357', '123', '33');
INSERT INTO `product_to_category` VALUES ('358', '123', '34');
INSERT INTO `product_to_category` VALUES ('375', '112', '27');
INSERT INTO `product_to_category` VALUES ('370', '113', '37');
INSERT INTO `product_to_category` VALUES ('372', '114', '37');
INSERT INTO `product_to_category` VALUES ('381', '124', '29');
INSERT INTO `product_to_category` VALUES ('384', '125', '35');
INSERT INTO `product_to_category` VALUES ('385', '126', '29');
INSERT INTO `product_to_category` VALUES ('386', '126', '35');
INSERT INTO `product_to_category` VALUES ('387', '127', '29');
INSERT INTO `product_to_category` VALUES ('388', '127', '35');
INSERT INTO `product_to_category` VALUES ('389', '128', '29');
INSERT INTO `product_to_category` VALUES ('390', '128', '35');
INSERT INTO `product_to_category` VALUES ('565', '129', '36');
INSERT INTO `product_to_category` VALUES ('564', '129', '28');
INSERT INTO `product_to_category` VALUES ('563', '130', '36');
INSERT INTO `product_to_category` VALUES ('562', '130', '28');
INSERT INTO `product_to_category` VALUES ('561', '131', '36');
INSERT INTO `product_to_category` VALUES ('560', '131', '28');
INSERT INTO `product_to_category` VALUES ('397', '132', '28');
INSERT INTO `product_to_category` VALUES ('398', '132', '36');
INSERT INTO `product_to_category` VALUES ('557', '133', '36');
INSERT INTO `product_to_category` VALUES ('556', '133', '28');
INSERT INTO `product_to_category` VALUES ('559', '134', '36');
INSERT INTO `product_to_category` VALUES ('558', '134', '28');
INSERT INTO `product_to_category` VALUES ('549', '135', '36');
INSERT INTO `product_to_category` VALUES ('548', '135', '28');
INSERT INTO `product_to_category` VALUES ('407', '136', '40');
INSERT INTO `product_to_category` VALUES ('408', '136', '41');
INSERT INTO `product_to_category` VALUES ('409', '137', '40');
INSERT INTO `product_to_category` VALUES ('410', '137', '41');
INSERT INTO `product_to_category` VALUES ('411', '138', '40');
INSERT INTO `product_to_category` VALUES ('412', '138', '41');
INSERT INTO `product_to_category` VALUES ('413', '139', '40');
INSERT INTO `product_to_category` VALUES ('414', '139', '41');
INSERT INTO `product_to_category` VALUES ('415', '140', '40');
INSERT INTO `product_to_category` VALUES ('416', '140', '41');
INSERT INTO `product_to_category` VALUES ('417', '141', '40');
INSERT INTO `product_to_category` VALUES ('418', '141', '41');
INSERT INTO `product_to_category` VALUES ('419', '142', '45');
INSERT INTO `product_to_category` VALUES ('420', '142', '46');
INSERT INTO `product_to_category` VALUES ('421', '143', '45');
INSERT INTO `product_to_category` VALUES ('422', '143', '46');
INSERT INTO `product_to_category` VALUES ('423', '144', '45');
INSERT INTO `product_to_category` VALUES ('424', '144', '46');
INSERT INTO `product_to_category` VALUES ('425', '145', '45');
INSERT INTO `product_to_category` VALUES ('426', '145', '46');
INSERT INTO `product_to_category` VALUES ('577', '146', '53');
INSERT INTO `product_to_category` VALUES ('576', '146', '52');
INSERT INTO `product_to_category` VALUES ('589', '147', '53');
INSERT INTO `product_to_category` VALUES ('588', '147', '52');
INSERT INTO `product_to_category` VALUES ('573', '148', '53');
INSERT INTO `product_to_category` VALUES ('572', '148', '52');
INSERT INTO `product_to_category` VALUES ('571', '149', '53');
INSERT INTO `product_to_category` VALUES ('570', '149', '52');
INSERT INTO `product_to_category` VALUES ('569', '150', '53');
INSERT INTO `product_to_category` VALUES ('568', '150', '52');
INSERT INTO `product_to_category` VALUES ('567', '151', '53');
INSERT INTO `product_to_category` VALUES ('566', '151', '52');
INSERT INTO `product_to_category` VALUES ('452', '152', '47');
INSERT INTO `product_to_category` VALUES ('450', '153', '47');
INSERT INTO `product_to_category` VALUES ('448', '154', '47');
INSERT INTO `product_to_category` VALUES ('446', '155', '47');
INSERT INTO `product_to_category` VALUES ('447', '155', '54');
INSERT INTO `product_to_category` VALUES ('449', '154', '54');
INSERT INTO `product_to_category` VALUES ('451', '153', '54');
INSERT INTO `product_to_category` VALUES ('453', '152', '54');
INSERT INTO `product_to_category` VALUES ('454', '156', '47');
INSERT INTO `product_to_category` VALUES ('455', '156', '54');
INSERT INTO `product_to_category` VALUES ('503', '157', '34');
INSERT INTO `product_to_category` VALUES ('502', '157', '33');
INSERT INTO `product_to_category` VALUES ('465', '158', '55');
INSERT INTO `product_to_category` VALUES ('464', '158', '51');
INSERT INTO `product_to_category` VALUES ('462', '159', '51');
INSERT INTO `product_to_category` VALUES ('463', '159', '55');
INSERT INTO `product_to_category` VALUES ('466', '160', '51');
INSERT INTO `product_to_category` VALUES ('467', '160', '55');
INSERT INTO `product_to_category` VALUES ('468', '161', '51');
INSERT INTO `product_to_category` VALUES ('469', '161', '55');
INSERT INTO `product_to_category` VALUES ('470', '162', '51');
INSERT INTO `product_to_category` VALUES ('471', '162', '55');
INSERT INTO `product_to_category` VALUES ('477', '163', '55');
INSERT INTO `product_to_category` VALUES ('476', '163', '51');
INSERT INTO `product_to_category` VALUES ('474', '164', '51');
INSERT INTO `product_to_category` VALUES ('475', '164', '55');
INSERT INTO `product_to_category` VALUES ('478', '165', '29');
INSERT INTO `product_to_category` VALUES ('479', '165', '35');
INSERT INTO `product_to_category` VALUES ('483', '166', '35');
INSERT INTO `product_to_category` VALUES ('482', '166', '29');
INSERT INTO `product_to_category` VALUES ('484', '167', '29');
INSERT INTO `product_to_category` VALUES ('485', '167', '35');
INSERT INTO `product_to_category` VALUES ('519', '175', '49');
INSERT INTO `product_to_category` VALUES ('518', '175', '48');
INSERT INTO `product_to_category` VALUES ('507', '174', '49');
INSERT INTO `product_to_category` VALUES ('506', '174', '48');
INSERT INTO `product_to_category` VALUES ('495', '170', '34');
INSERT INTO `product_to_category` VALUES ('494', '170', '33');
INSERT INTO `product_to_category` VALUES ('579', '171', '34');
INSERT INTO `product_to_category` VALUES ('578', '171', '33');
INSERT INTO `product_to_category` VALUES ('511', '176', '49');
INSERT INTO `product_to_category` VALUES ('510', '176', '48');
INSERT INTO `product_to_category` VALUES ('513', '177', '49');
INSERT INTO `product_to_category` VALUES ('512', '177', '48');
INSERT INTO `product_to_category` VALUES ('514', '178', '48');
INSERT INTO `product_to_category` VALUES ('515', '178', '49');
INSERT INTO `product_to_category` VALUES ('516', '179', '48');
INSERT INTO `product_to_category` VALUES ('517', '179', '49');
INSERT INTO `product_to_category` VALUES ('520', '180', '50');
INSERT INTO `product_to_category` VALUES ('521', '180', '56');
INSERT INTO `product_to_category` VALUES ('522', '181', '50');
INSERT INTO `product_to_category` VALUES ('523', '181', '56');
INSERT INTO `product_to_category` VALUES ('524', '182', '50');
INSERT INTO `product_to_category` VALUES ('525', '182', '56');
INSERT INTO `product_to_category` VALUES ('526', '183', '50');
INSERT INTO `product_to_category` VALUES ('527', '183', '56');
INSERT INTO `product_to_category` VALUES ('528', '184', '50');
INSERT INTO `product_to_category` VALUES ('529', '184', '56');
INSERT INTO `product_to_category` VALUES ('530', '185', '50');
INSERT INTO `product_to_category` VALUES ('531', '185', '56');
INSERT INTO `product_to_category` VALUES ('587', '186', '56');
INSERT INTO `product_to_category` VALUES ('586', '186', '50');

-- ----------------------------
-- Table structure for product_to_color
-- ----------------------------
DROP TABLE IF EXISTS `product_to_color`;
CREATE TABLE `product_to_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of product_to_color
-- ----------------------------
INSERT INTO `product_to_color` VALUES ('67', '5', '2');
INSERT INTO `product_to_color` VALUES ('68', '5', '3');
INSERT INTO `product_to_color` VALUES ('69', '5', '4');
INSERT INTO `product_to_color` VALUES ('70', '5', '5');
INSERT INTO `product_to_color` VALUES ('71', '5', '6');
INSERT INTO `product_to_color` VALUES ('72', '5', '7');
INSERT INTO `product_to_color` VALUES ('75', '3', '2');
INSERT INTO `product_to_color` VALUES ('76', '3', '3');
INSERT INTO `product_to_color` VALUES ('79', '4', '2');
INSERT INTO `product_to_color` VALUES ('81', '8', '3');
INSERT INTO `product_to_color` VALUES ('82', '186', '2');
INSERT INTO `product_to_color` VALUES ('83', '186', '3');
INSERT INTO `product_to_color` VALUES ('84', '186', '4');
INSERT INTO `product_to_color` VALUES ('85', '147', '2');
INSERT INTO `product_to_color` VALUES ('86', '147', '3');
INSERT INTO `product_to_color` VALUES ('87', '147', '4');

-- ----------------------------
-- Table structure for product_to_option
-- ----------------------------
DROP TABLE IF EXISTS `product_to_option`;
CREATE TABLE `product_to_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of product_to_option
-- ----------------------------

-- ----------------------------
-- Table structure for product_to_season
-- ----------------------------
DROP TABLE IF EXISTS `product_to_season`;
CREATE TABLE `product_to_season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `id_season` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of product_to_season
-- ----------------------------

-- ----------------------------
-- Table structure for product_to_size
-- ----------------------------
DROP TABLE IF EXISTS `product_to_size`;
CREATE TABLE `product_to_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `note` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_to_size
-- ----------------------------
INSERT INTO `product_to_size` VALUES ('1', '120', '1', '');
INSERT INTO `product_to_size` VALUES ('2', '186', '1', '');
INSERT INTO `product_to_size` VALUES ('3', '186', '2', '');
INSERT INTO `product_to_size` VALUES ('4', '186', '3', '');
INSERT INTO `product_to_size` VALUES ('5', '186', '4', '');
INSERT INTO `product_to_size` VALUES ('6', '147', '1', '');
INSERT INTO `product_to_size` VALUES ('7', '147', '2', '');
INSERT INTO `product_to_size` VALUES ('8', '147', '3', '');
INSERT INTO `product_to_size` VALUES ('9', '147', '4', '');

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `lat` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `lng` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `districtid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', '13B Conic Phong Phú', '10.71240234375', '106.64177703857', '1');
INSERT INTO `project` VALUES ('2', '13D Asia Phú Mỹ', '10.705533027649', '106.64806365967', '1');

-- ----------------------------
-- Table structure for province
-- ----------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of province
-- ----------------------------
INSERT INTO `province` VALUES ('1', 'Hồ Chí Minh', 'SG', '20000', null);
INSERT INTO `province` VALUES ('2', 'Hà Nội', 'HN', '30000', null);
INSERT INTO `province` VALUES ('3', 'Đà Nẵng', 'DDN', '0', null);
INSERT INTO `province` VALUES ('4', 'Bình Dương', 'BD', '0', null);
INSERT INTO `province` VALUES ('5', 'Đồng Nai', 'DNA', '0', null);
INSERT INTO `province` VALUES ('6', 'Khánh Hòa', 'KH', '0', null);
INSERT INTO `province` VALUES ('7', 'Hải Phòng', 'HP', '0', null);
INSERT INTO `province` VALUES ('8', 'Long An', 'LA', '0', null);
INSERT INTO `province` VALUES ('9', 'Quảng Nam', 'QNA', '0', null);
INSERT INTO `province` VALUES ('10', 'Bà Rịa Vũng Tàu', 'VT', '0', null);
INSERT INTO `province` VALUES ('11', 'Đắk Lắk', 'DDL', '0', null);
INSERT INTO `province` VALUES ('12', 'Cần Thơ', 'CT', '0', null);
INSERT INTO `province` VALUES ('13', 'Bình Thuận  ', 'BTH', '0', null);
INSERT INTO `province` VALUES ('14', 'Lâm Đồng', 'LDD', '0', null);
INSERT INTO `province` VALUES ('15', 'Thừa Thiên Huế', 'TTH', '0', null);
INSERT INTO `province` VALUES ('16', 'Kiên Giang', 'KG', '0', null);
INSERT INTO `province` VALUES ('17', 'Bắc Ninh', 'BN', '0', null);
INSERT INTO `province` VALUES ('18', 'Quảng Ninh', 'QNI', '0', null);
INSERT INTO `province` VALUES ('19', 'Thanh Hóa', 'TH', '0', null);
INSERT INTO `province` VALUES ('20', 'Nghệ An', 'NA', '0', null);
INSERT INTO `province` VALUES ('21', 'Hải Dương', 'HD', '0', null);
INSERT INTO `province` VALUES ('22', 'Gia Lai', 'GL', '0', null);
INSERT INTO `province` VALUES ('23', 'Bình Phước', 'BP', '0', null);
INSERT INTO `province` VALUES ('24', 'Hưng Yên', 'HY', '0', null);
INSERT INTO `province` VALUES ('25', 'Bình Định', 'BDD', '0', null);
INSERT INTO `province` VALUES ('26', 'Tiền Giang', 'TG', '0', null);
INSERT INTO `province` VALUES ('27', 'Thái Bình', 'TB', '0', null);
INSERT INTO `province` VALUES ('28', 'Bắc Giang', 'BG', '0', null);
INSERT INTO `province` VALUES ('29', 'Hòa Bình', 'HB', '0', null);
INSERT INTO `province` VALUES ('30', 'An Giang', 'AG', '0', null);
INSERT INTO `province` VALUES ('31', 'Vĩnh Phúc', 'VP', '0', null);
INSERT INTO `province` VALUES ('32', 'Tây Ninh', 'TNI', '0', null);
INSERT INTO `province` VALUES ('33', 'Thái Nguyên', 'TN', '0', null);
INSERT INTO `province` VALUES ('34', 'Lào Cai', 'LCA', '0', null);
INSERT INTO `province` VALUES ('35', 'Nam Định', 'NDD', '0', null);
INSERT INTO `province` VALUES ('36', 'Quảng Ngãi', 'QNG', '0', null);
INSERT INTO `province` VALUES ('37', 'Bến Tre', 'BTR', '0', null);
INSERT INTO `province` VALUES ('38', 'Đắk Nông', 'DNO', '0', null);
INSERT INTO `province` VALUES ('39', 'Cà Mau', 'CM', '120000', null);
INSERT INTO `province` VALUES ('40', 'Vĩnh Long', 'VL', '3', null);
INSERT INTO `province` VALUES ('41', 'Ninh Bình', 'NB', '320', null);
INSERT INTO `province` VALUES ('42', 'Phú Thọ', 'PT', '25', null);
INSERT INTO `province` VALUES ('43', 'Ninh Thuận', 'NT', '120000', null);
INSERT INTO `province` VALUES ('44', 'Phú Yên', 'PY', '123456', null);
INSERT INTO `province` VALUES ('45', 'Hà Nam', 'HNA', '40000', null);
INSERT INTO `province` VALUES ('46', 'Hà Tĩnh', 'HT', '12000', null);
INSERT INTO `province` VALUES ('47', 'Đồng Tháp', 'DDT', '0', null);
INSERT INTO `province` VALUES ('48', 'Sóc Trăng', 'ST', '0', null);
INSERT INTO `province` VALUES ('49', 'Kon Tum', 'KT', '0', null);
INSERT INTO `province` VALUES ('50', 'Quảng Bình', 'QB', '0', null);
INSERT INTO `province` VALUES ('51', 'Quảng Trị', 'QT', '0', null);
INSERT INTO `province` VALUES ('52', 'Trà Vinh', 'TV', '0', null);
INSERT INTO `province` VALUES ('53', 'Hậu Giang', 'HGI', '0', null);
INSERT INTO `province` VALUES ('54', 'Sơn La', 'SL', '0', null);
INSERT INTO `province` VALUES ('55', 'Bạc Liêu', 'BL', '0', null);
INSERT INTO `province` VALUES ('56', 'Yên Bái', 'YB', '0', null);
INSERT INTO `province` VALUES ('57', 'Tuyên Quang', 'TQ', '0', null);
INSERT INTO `province` VALUES ('58', 'Điện Biên', 'DDB', '0', null);
INSERT INTO `province` VALUES ('59', 'Lai Châu', 'LCH', '0', null);
INSERT INTO `province` VALUES ('60', 'Lạng Sơn', 'LS', '0', null);
INSERT INTO `province` VALUES ('61', 'Hà Giang', 'HG', '0', null);
INSERT INTO `province` VALUES ('62', 'Bắc Kạn', 'BK', '0', null);
INSERT INTO `province` VALUES ('63', 'Cao Bằng', 'CB', '0', null);

-- ----------------------------
-- Table structure for pro_size
-- ----------------------------
DROP TABLE IF EXISTS `pro_size`;
CREATE TABLE `pro_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of pro_size
-- ----------------------------

-- ----------------------------
-- Table structure for pro_values
-- ----------------------------
DROP TABLE IF EXISTS `pro_values`;
CREATE TABLE `pro_values` (
  `pro_id` int(11) DEFAULT NULL,
  `attr_id` int(11) DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of pro_values
-- ----------------------------

-- ----------------------------
-- Table structure for pucharse
-- ----------------------------
DROP TABLE IF EXISTS `pucharse`;
CREATE TABLE `pucharse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `supplier` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `supplier_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_pucharse` int(11) DEFAULT NULL,
  `user_create` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `pay_ncc` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `note` text CHARACTER SET utf8,
  `date` char(30) COLLATE utf8_bin DEFAULT NULL,
  `time` char(20) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `total_pay` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0 : Hoá Đơn Nhập Hàng / 1 : hoá đơn Trả Hàng',
  `return_total` int(11) DEFAULT '0' COMMENT 'tổng số tiền NCC cần trả lại',
  `return_payted` int(11) DEFAULT '0' COMMENT 'Số tiền NCC đã trả ',
  `return_pucharse` int(11) DEFAULT '0' COMMENT 'mã đơn nhập hàng gốc',
  `return_sale` int(11) DEFAULT '0' COMMENT 'Số Tiền GIảm Giá ',
  `debt` float DEFAULT '0',
  `nkd` int(11) DEFAULT '0',
  `nkc` int(11) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pucharse
-- ----------------------------

-- ----------------------------
-- Table structure for pucharse_detail
-- ----------------------------
DROP TABLE IF EXISTS `pucharse_detail`;
CREATE TABLE `pucharse_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pucharse_id` int(11) DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `price_imp` int(11) DEFAULT NULL,
  `price_return` int(11) DEFAULT NULL COMMENT 'Giá Sản Phẩm Khi Trả Lại',
  `sale` int(11) DEFAULT NULL COMMENT 'giảm giá sản phẩm khi trả hàng',
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT '0' COMMENT '0 : nhập hàng, 1 : trả hàng',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pucharse_detail
-- ----------------------------

-- ----------------------------
-- Table structure for p_images
-- ----------------------------
DROP TABLE IF EXISTS `p_images`;
CREATE TABLE `p_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `url` char(200) CHARACTER SET utf8 DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of p_images
-- ----------------------------
INSERT INTO `p_images` VALUES ('9', '', '43', 'upload/img/products_multi/21.jpg', null, '', null);
INSERT INTO `p_images` VALUES ('10', '', '43', 'upload/img/products_multi/22.jpg', null, '', null);
INSERT INTO `p_images` VALUES ('11', 'anh so 1', '93', 'upload/img/products_multi/web.png', null, '', null);
INSERT INTO `p_images` VALUES ('13', 'anh 2', '92', 'upload/img/products_multi/logo1.png', null, '', null);
INSERT INTO `p_images` VALUES ('14', '', '92', 'upload/img/products_multi/logo-thep.jpg', null, '', null);
INSERT INTO `p_images` VALUES ('16', 'anh so 2', null, 'upload/img/products_multi/logo-thep1.jpg', null, '', null);
INSERT INTO `p_images` VALUES ('17', 'anh so 2', null, null, null, '', null);
INSERT INTO `p_images` VALUES ('18', 'anh so 123', null, 'upload/img/products_multi/logo.png', null, '', null);
INSERT INTO `p_images` VALUES ('19', 'anh cho 91', null, null, null, '', null);
INSERT INTO `p_images` VALUES ('20', 'anh cho 91', null, 'upload/img/products_multi/logo1.png', null, '', null);
INSERT INTO `p_images` VALUES ('22', 'anh so 1', '15', 'upload/img/products_multi/golf.png', null, '', null);
INSERT INTO `p_images` VALUES ('23', null, '93', 'upload/img/products_multi/giay-bet-nu-cuc-dep-2017-1509779416-06321602-ba37482ac44d7060ec4383460d6cec49-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('25', null, '95', 'upload/img/products_multi/giay-luoi-nam-sport-sieu-nhe-1509089650-70808581-284822f8215510444727605b7be84b4c-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('27', null, '99', 'upload/img/products_multi/giay-luoi-nu-giay-slip-on-giay-de-bang-giay-nu-thoi-trang-nu-dodaco-ddc2026-mh-10-bac-ha-1511344819-92984812-44b464835378c3965f6d18074a1a105c-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('28', null, '100', 'upload/img/products_multi/giay-moi-nu-om-fashion-0169trang-1508913417-06851081-e18bf214aa0357888c18f92cda908783-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('29', null, '101', 'upload/img/products_multi/giay-nam-dang-han-quoc-1516874863-94200433-25137f5aab9af751600b96ead0681c1c-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('30', null, '102', 'upload/img/products_multi/giay-nam-thoi-trang-nam-cao-cap-pettino-gv08-den-1506650409-0893705-00cf5b7c7df8d25f40d489e3ba02e82f-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('31', null, '103', 'upload/img/products_multi/giay-sneaker-nam-giay-the-thao-nam-mando-giay-thoi-trang-nam-gd07-trang-1514189407-25334751-c78be32e2bdd853b51c566ee202ad56a-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('32', null, '104', 'upload/img/products_multi/giay-sneaker-thoi-trang-nam-alami-gtt321-xam-1513074624-66186091-94b373b3bc515e12307b65cc3c60d3db-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('33', null, '105', 'upload/img/products_multi/giay-the-thao-chay-bo-sneaker-nam-sanh-dieu-tk-01-cam-1513150233-80544362-9f227ab1438b943881a05d6509f07592-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('34', null, '106', 'upload/img/products_multi/giay-the-thao-nam-nike-zoom-chat-xin-rat-em-chan-1516950304-06674533-e70562ef39f85034760ce7ce876b3d44-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('35', null, '107', 'upload/img/products_multi/giay-the-thao-nam-sieu-nhe-kieu-dang-cao-cap-1515741021-47413213-78602464cdf42e49fe137b15dfa7ca09-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('36', null, '108', 'upload/img/products_multi/giay-thoi-trang-nu-don-de-1510205418-92852612-9386c4c2154dc4fbb8aa88f82279ff69-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('37', null, '109', 'upload/img/products_multi/giay-vai-nam-1507300387-82479951-4b2ba103eceb24f1fd2de8d58eed98d0-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('38', null, '110', 'upload/img/products_multi/giay-vai-nam-cao-cap-1513740674-87769661-562da0b84934287f8e4b8b596b6db956-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('39', null, '99', 'upload/img/products_multi/giay-luoi-nu-giay-slip-on-giay-de-bang-giay-nu-thoi-trang-nu-dodaco-ddc2026-mh-9-xanh-ke-to-1511344821-35094812-f7067c37e62eb5c02305bc11f337a645-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('41', null, '97', 'upload/img/products_multi/giay-luoi-nu-giay-slip-on-giay-de-bang-giay-nu-thoi-trang-nu-dodaco-ddc1835-trang-1514403605-0324805-45b1f7bacf50b5c187550a72fe54e880-catalog_233.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('42', '1', '157', 'upload/img/products_multi/1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('43', '2', '157', 'upload/img/products_multi/3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('44', '3', '157', 'upload/img/products_multi/2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('49', null, '135', 'upload/img/products_multi/ao-phao-nu-07_2.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('50', null, '135', 'upload/img/products_multi/ao-phao-nu-07_3.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('51', null, '135', 'upload/img/products_multi/ao-phao-nu-07_1.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('52', null, '133', 'upload/img/products_multi/ao-phao-nu-13_1.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('53', null, '133', 'upload/img/products_multi/ao-phao-nu-13_2.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('54', null, '133', 'upload/img/products_multi/ao-phao-nu-13_3.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('55', '', '134', 'upload/img/products_multi/ao-phao-nu-17_1.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('62', '', '132', 'upload/img/products_multi/ao-phao-nu-15-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('60', '', '134', 'upload/img/products_multi/ao-phao-nu-17.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('63', '', '132', 'upload/img/products_multi/ao-phao-nu-15-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('64', '', '132', 'upload/img/products_multi/ao-phao-nu-15-3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('65', '', '131', 'upload/img/products_multi/ao-phao-nu-09-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('66', '', '131', 'upload/img/products_multi/ao-phao-nu-09-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('67', '', '131', 'upload/img/products_multi/ao-phao-nu-09.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('68', '', '130', 'upload/img/products_multi/ao-phao-nu-03-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('69', '', '130', 'upload/img/products_multi/ao-phao-nu-03-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('70', '', '130', 'upload/img/products_multi/ao-phao-nu-03-3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('71', null, '129', 'upload/img/products_multi/ao-phao-nu-01-1.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('72', '', '129', 'upload/img/products_multi/ao-phao-nu-01-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('73', '', '129', 'upload/img/products_multi/ao-phao-nu-01-3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('74', null, '151', 'upload/img/products_multi/7_ao-ren-nu-2.jpg', null, null, null);
INSERT INTO `p_images` VALUES ('75', '', '151', 'upload/img/products_multi/7-ao-ren-nu-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('76', '', '151', 'upload/img/products_multi/7-ao-ren-nu-3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('77', '', '150', 'upload/img/products_multi/5-ao-ren-nu-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('78', '', '150', 'upload/img/products_multi/5-ao-ren-nu-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('79', '', '150', 'upload/img/products_multi/5-ao-ren-nu-3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('80', '', '149', 'upload/img/products_multi/4-ao-lot-nu-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('81', '', '149', 'upload/img/products_multi/4-ao-lot-nu-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('82', '', '149', 'upload/img/products_multi/4-ao-lot-nu-3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('83', '', '148', 'upload/img/products_multi/3-ao-lot-nu-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('84', '', '148', 'upload/img/products_multi/3-ao-lot-nu-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('85', '', '148', 'upload/img/products_multi/31.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('86', '', '147', 'upload/img/products_multi/2-ao-lot-nu-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('87', '', '147', 'upload/img/products_multi/2-ao-lot-nu-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('88', '', '147', 'upload/img/products_multi/2-ao-lot-nu-3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('89', '', '146', 'upload/img/products_multi/1-ao-lot-nu-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('90', '', '146', 'upload/img/products_multi/1-ao-lot-nu-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('91', '', '146', 'upload/img/products_multi/1-ao-lot-nu-3.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('92', '', '171', 'upload/img/products_multi/1-bo-do-ngu-1.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('93', '', '171', 'upload/img/products_multi/1-bo-do-ngu-2.jpg', null, '', '0');
INSERT INTO `p_images` VALUES ('94', null, '187', 'upload/img/products_multi/1-bo-do-ngu-21.jpg', null, null, null);

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sanpham` int(11) DEFAULT NULL,
  `comment` text CHARACTER SET utf8,
  `flg` int(11) DEFAULT NULL,
  `reply` int(11) DEFAULT NULL,
  `review` tinyint(1) DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES ('13', '5', 'hhhhggg', null, '0', null, 'sieuwebqt', 'dangtranmanh@gmail.com', '1505724581', null);
INSERT INTO `questions` VALUES ('14', '5', 'hhhhggg', null, '0', null, 'sieuwebqt', 'dangtranmanh@gmail.com', '1505724675', null);
INSERT INTO `questions` VALUES ('15', '5', 'noi dung', null, '0', null, 'nguyen đát', 'dat@gmail.com', '1505725003', null);
INSERT INTO `questions` VALUES ('16', '5', 'noi dung câu hỏi', null, '0', null, 'tran manh', 'tranmanh@gmail.com', '1505725440', null);
INSERT INTO `questions` VALUES ('17', '5', 'noi dung cua toi', null, '0', null, 'khowebqts', 'tranmanh@gmail.com', '1505725631', null);
INSERT INTO `questions` VALUES ('18', '5', 'noi dung', null, '0', '1', 'tranmanh', 'tranmanh@gmail.com', '1505725689', null);
INSERT INTO `questions` VALUES ('19', '5', 'noi dung', null, '0', '1', 'sieuwebqt', 'tranmanh@gmail.com', '1505725843', null);
INSERT INTO `questions` VALUES ('20', '5', 'noi dung', null, '0', '1', 'sieuwebqt', 'tranmanh@gmail.com', '1505725878', null);
INSERT INTO `questions` VALUES ('21', '5', 'noi dung', null, '0', '1', 'sieuwebqt', 'tranmanh@gmail.com', '1505725928', null);
INSERT INTO `questions` VALUES ('22', '5', 'noi dung câu hỏi', null, '0', '1', 'tranmanh', 'dangtranmanh@gmail.com', '1505726276', null);
INSERT INTO `questions` VALUES ('23', '5', 'noi dung cau tra loi', null, '21', '1', 'van đạt', 'dat@gmail.com', '1505726568', null);
INSERT INTO `questions` VALUES ('24', '4', 'sâssa', null, '0', '1', 'Vân', 'buivananh.th@gmail.com', '1505981779', null);

-- ----------------------------
-- Table structure for raovat
-- ----------------------------
DROP TABLE IF EXISTS `raovat`;
CREATE TABLE `raovat` (
  `home` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `description_seo` text COLLATE utf8_unicode_ci,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `caption_1` text COLLATE utf8_unicode_ci,
  `caption_2` text COLLATE utf8_unicode_ci,
  `locale` int(11) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT 'vi',
  `caption_3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(8) DEFAULT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `raovat_dir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `multi_image` text COLLATE utf8_unicode_ci,
  `img_dir` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tinhtrang` tinyint(1) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `style` int(11) DEFAULT NULL,
  `id_value` int(11) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of raovat
-- ----------------------------
INSERT INTO `raovat` VALUES ('1', null, '0', '1', '0', '0', '<p>n&ocirc;i dung m&ocirc; ta</p>\r\n', '', '', '', '<p>noi dung chi tiet</p>\r\n', null, null, null, '<p>noi dung phu</p>\r\n', '0', '1', '0', 'vi', null, '1504065201', null, null, null, null, '0', null, '620', '1', null, null, '0', 'bán nhà tai hà nội', '', 'ban-nha-tai-ha-noi', null, null);
INSERT INTO `raovat` VALUES ('1', null, '0', '1', '12424334', '12332342', '<p>n&ocirc;i dung m&ocirc; ta</p>\r\n', '', '', '', '<p>noi dung chi tiet</p>\r\n', null, '29', null, '<p>noi dung phu</p>\r\n', '6', '2', '0', 'vi', null, '1504068779', null, '30082017', null, null, '0', null, '620', '2', null, null, '14', 'bán nhà tai hà nội đường số 237', '', 'ban-nha-tai-ha-noi-duong-so-237', 'db652781fa07e94e75c9023c9de373cf.jpg', null);
INSERT INTO `raovat` VALUES ('1', '1', '12', '1', '1234566', '1234333', '<p>n&ocirc;i dung m&ocirc; ta</p>\r\n', '', '', '', '<p>noi dung chi tiet</p>\r\n', null, '28', null, '<p>noi dung phu</p>\r\n', '5', '3', '0', 'vi', null, '1516353599', null, '30082017', null, null, '0', null, null, '3', null, null, '10', 'bán nhà tai hà nội viet nam', '', 'ban-nha-tai-ha-noi-viet-nam', '766564be313697c3bdae612b28a89d0a.jpg', '1');

-- ----------------------------
-- Table structure for raovat_category
-- ----------------------------
DROP TABLE IF EXISTS `raovat_category`;
CREATE TABLE `raovat_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `home` tinyint(1) DEFAULT '0',
  `sort` int(3) DEFAULT '0',
  `hot` tinyint(1) DEFAULT '0',
  `focus` tinyint(1) DEFAULT '0',
  `lang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `keyword_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_seo` text CHARACTER SET utf8,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of raovat_category
-- ----------------------------
INSERT INTO `raovat_category` VALUES ('20', 'Điện thoại, viễn thông ', 'upload/img/phone.png', 'dien-thoai-vien-thong', '0', '                                                                                                                                                                                                            ', '0', '1', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('27', 'Ô tô, xe máy, xe đạp', 'upload/img/oto.png', 'o-to-xe-may-xe-dap', '0', '', '0', '0', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('28', 'Xây dựng, công nghiệp', 'upload/img/connghiep.png', 'xay-dung-cong-nghiep', '0', '                                                                                                                                        ', '0', '0', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('29', 'Thời trang, phụ kiện', 'upload/img/thoitrang.png', 'thoi-trang-phu-kien', '0', '', '0', '0', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('30', 'Mẹ & Bé', 'upload/img/me_be.png', 'me-be', '0', '', '0', '0', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('31', 'Sức khỏe, sắc đẹp', 'upload/img/suckhoe.png', 'suc-khoe-sac-dep', '0', '', '0', '0', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('33', 'Nội thất, ngoại thất', 'upload/img/noithat.png', 'noi-that-ngoai-that', '0', '', '0', '0', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('34', 'Sách, đồ văn phòng', 'upload/img/sach.png', 'sach-do-van-phong', '0', '', '0', '0', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('35', 'Hoa, quà tặng, đồ chơi', 'upload/img/qua_tang.png', 'hoa-qua-tang-do-choi', '0', '', '0', '0', '0', '0', 'vi', null, null, null);
INSERT INTO `raovat_category` VALUES ('42', 'Khác', '', 'khac', '0', '', '0', '2', '1', '1', 'vi', '', null, '');

-- ----------------------------
-- Table structure for raovat_images
-- ----------------------------
DROP TABLE IF EXISTS `raovat_images`;
CREATE TABLE `raovat_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `url` char(200) CHARACTER SET utf8 DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of raovat_images
-- ----------------------------
INSERT INTO `raovat_images` VALUES ('1', null, '3', 'upload/img/raovats_multi/f46482c87ab814e5d5ea59819e568564.jpg', null, null, null);
INSERT INTO `raovat_images` VALUES ('2', null, '3', 'upload/img/raovats_multi/f4b467b6d383eb5d6062b2fa9c9c0708.jpg', null, null, null);
INSERT INTO `raovat_images` VALUES ('3', null, '3', 'upload/img/raovats_multi/e86f742e7d986de26413443600fa8535.jpg', null, null, null);
INSERT INTO `raovat_images` VALUES ('4', null, '3', 'upload/img/raovats_multi/d640c2db815fbba330306bdbdc9e9326.jpg', null, null, null);
INSERT INTO `raovat_images` VALUES ('5', null, '2', 'upload/img/raovats_multi/3915f302b19fa28fc4001d6a66238681.jpg', null, null, null);
INSERT INTO `raovat_images` VALUES ('6', null, '2', 'upload/img/raovats_multi/866917b6bab0b8c3eeb0f52f45efd867.jpg', null, null, null);
INSERT INTO `raovat_images` VALUES ('7', null, '2', 'upload/img/raovats_multi/a8f9dbaa6c627b3a47a0f442cbe0c1ab.jpg', null, null, null);

-- ----------------------------
-- Table structure for raovat_tag
-- ----------------------------
DROP TABLE IF EXISTS `raovat_tag`;
CREATE TABLE `raovat_tag` (
  `raovat_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `raovat_id` int(11) NOT NULL,
  `lang` varchar(11) CHARACTER SET utf8 NOT NULL,
  `tag` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `alias` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`raovat_tag_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of raovat_tag
-- ----------------------------

-- ----------------------------
-- Table structure for raovat_to_category
-- ----------------------------
DROP TABLE IF EXISTS `raovat_to_category`;
CREATE TABLE `raovat_to_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_raovat` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of raovat_to_category
-- ----------------------------
INSERT INTO `raovat_to_category` VALUES ('18', '3', '27');
INSERT INTO `raovat_to_category` VALUES ('19', '3', '28');
INSERT INTO `raovat_to_category` VALUES ('26', '2', '27');
INSERT INTO `raovat_to_category` VALUES ('27', '2', '28');
INSERT INTO `raovat_to_category` VALUES ('28', '2', '29');

-- ----------------------------
-- Table structure for resources
-- ----------------------------
DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `resource` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `icon` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `active` int(1) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of resources
-- ----------------------------
INSERT INTO `resources` VALUES ('10', '0', 'product', 'Quản lý sản phẩm', null, '3', 'fa-bars', '', '1');
INSERT INTO `resources` VALUES ('11', '10', 'products', 'Danh sách sản phẩm', null, '1', 'fa-files-o', 'uetadmin/product/products', '1');
INSERT INTO `resources` VALUES ('13', '116', 'listColor', 'Màu sắc', null, '3', 'fa-circle-o', 'uetadmin/attribute/listColor', '1');
INSERT INTO `resources` VALUES ('14', '116', 'listprice', 'Khoảng giá', null, '4', 'fa-circle-o', 'uetadmin/attribute/listprice', '1');
INSERT INTO `resources` VALUES ('15', '116', 'listOption', 'Kích thước', null, '5', 'fa-circle-o', 'uetadmin/attribute/listOption', '1');
INSERT INTO `resources` VALUES ('17', '0', 'menu', 'Quản lý menu', null, '7', 'fa-bars', 'uetadmin/menu/menulist', '1');
INSERT INTO `resources` VALUES ('18', '10', 'category_pro', 'Danh mục sản phẩm', null, '2', 'fa-files-o', 'uetadmin/product/categories', '1');
INSERT INTO `resources` VALUES ('19', '173', 'comments', 'Đánh giá bình luận', null, '3', 'fa-comments-o', 'uetadmin/comment/comments', '1');
INSERT INTO `resources` VALUES ('20', '173', 'questions', 'Danh sách hỏi đáp', null, '4', 'fa-question-circle', 'uetadmin/comment/questions', '1');
INSERT INTO `resources` VALUES ('22', '174', 'listpro', 'Thẻ tags sản phẩm', null, '5', 'fa-tag', 'uetadmin/tag/listpro', '0');
INSERT INTO `resources` VALUES ('25', '0', 'news', 'Quản lý tin bài', null, '6', 'fa-newspaper-o', '', '1');
INSERT INTO `resources` VALUES ('26', '25', 'newslist', 'Danh sách tin', null, '1', 'fa-file-text-o', 'uetadmin/news/newslist', '1');
INSERT INTO `resources` VALUES ('28', '25', 'tagsnews', 'Tags tin tức', null, '3', 'fa fa-tag', '', '0');
INSERT INTO `resources` VALUES ('29', '0', 'media', 'Quản lý media', null, '1', 'fa-picture-o', '', '0');
INSERT INTO `resources` VALUES ('30', '29', 'listAll', 'Danh sách media', null, '1', 'fa-file-image-o', 'uetadmin/media/listAll', '1');
INSERT INTO `resources` VALUES ('31', '25', 'categories', 'Danh mục tin', null, '2', 'fa-newspaper-o', 'uetadmin/news/categories', '1');
INSERT INTO `resources` VALUES ('32', '29', 'categories', 'Danh mục media', null, '2', 'fa-file-image-o', 'uetadmin/media/categories', '1');
INSERT INTO `resources` VALUES ('33', '0', 'users', 'Quản lý thành viên', null, '16', 'fa-users', '', '1');
INSERT INTO `resources` VALUES ('34', '33', 'smslist', 'Tin Nhắn SMS', null, '6', 'fa-commenting-o', 'uetadmin/users/smslist', '0');
INSERT INTO `resources` VALUES ('39', '0', 'pages', 'Quản lý nội dung', null, '9', 'fa-file-o', 'uetadmin/pages/pagelist', '1');
INSERT INTO `resources` VALUES ('40', '0', 'video', 'Quản Lý Video', null, '2', 'fa-video-camera', '', '0');
INSERT INTO `resources` VALUES ('42', '40', 'listAll', 'Danh sách video', null, '1', 'fa-file-video-o', 'uetadmin/video/listAll', '1');
INSERT INTO `resources` VALUES ('43', '40', 'category_video', 'Danh mục video', null, '2', 'fa-video-camera', 'uetadmin/video/categories', '1');
INSERT INTO `resources` VALUES ('44', '107', 'listraovat', 'Danh sách rao vặt', null, '1', 'fa-files-o', 'uetadmin/raovat/listraovat', '1');
INSERT INTO `resources` VALUES ('49', '107', 'categories', 'Danh mục rao vặt', null, '2', 'fa-files-o', 'uetadmin/raovat/categories', '1');
INSERT INTO `resources` VALUES ('53', '0', 'imageupload', 'Quản lý banner', null, '8', 'fa-file-image-o', 'uetadmin/imageupload/banners', '1');
INSERT INTO `resources` VALUES ('54', '162', 'listWard', 'Quản lý phường xã', null, '3', 'fa-map-signs', 'uetadmin/province/listWard', '0');
INSERT INTO `resources` VALUES ('56', '162', 'listDistric', 'Quản lý quận huyện', null, '2', 'fa-map-marker', 'uetadmin/province/listDistric', '0');
INSERT INTO `resources` VALUES ('57', '162', 'street', 'Quản lý đường phố', null, '4', 'fa-road', 'uetadmin/province/listStreet', '0');
INSERT INTO `resources` VALUES ('58', '97', 'soldout', 'danh sách hết hàng', null, '1', 'fa-circle-o', 'uetadmin/report/soldout', '0');
INSERT INTO `resources` VALUES ('63', '10', 'cat_add', 'Thêm - Sửa danh mục sp', null, '9', '', '', '0');
INSERT INTO `resources` VALUES ('64', '95', 'maps', 'Cấu hình bản đồ Maps', null, '1', ' fa-map-o', 'uetadmin/admin/bando_map', '1');
INSERT INTO `resources` VALUES ('65', '10', 'add', 'Thêm -Sửa sản phẩm', null, '7', '', '', '0');
INSERT INTO `resources` VALUES ('66', '17', 'delete', 'Xóa menu', null, '2', '', '', '0');
INSERT INTO `resources` VALUES ('67', '10', 'delete_once', 'Xóa sản phẩm', null, '8', '', '', '0');
INSERT INTO `resources` VALUES ('95', '0', 'admin', 'Hệ thống', null, '17', 'fa-gears text-red', '', '1');
INSERT INTO `resources` VALUES ('96', '95', 'site_option', 'Cấu hình hệ thống', null, '0', 'fa-circle-o text-red', 'uetadmin/admin/site_option', '1');
INSERT INTO `resources` VALUES ('97', '0', 'report', 'Báo cáo-Thống kê', null, '19', '', '', '0');
INSERT INTO `resources` VALUES ('98', '104', 'listProvince', 'Phí vận chuyển', null, '3', 'fa-truck', 'uetadmin/order/listProvince', '1');
INSERT INTO `resources` VALUES ('99', '90', 'categories', 'Danh mục share', null, '0', null, null, null);
INSERT INTO `resources` VALUES ('100', '90', 'cat_add', 'Thêm danh mục share', null, '0', null, null, null);
INSERT INTO `resources` VALUES ('101', '90', 'cat_edit', 'Sửa danh mục share', null, '0', null, null, null);
INSERT INTO `resources` VALUES ('102', '90', 'delete_cat', 'Xóa danh mục share', null, '0', null, null, null);
INSERT INTO `resources` VALUES ('103', '97', 'bestsellers', 'Hàng bán chạy', null, '2', 'fa-circle-o', 'uetadmin/report/bestsellers', '0');
INSERT INTO `resources` VALUES ('104', '0', 'order', 'Quản lý giỏ hàng', null, '4', 'fa-shopping-cart', '', '1');
INSERT INTO `resources` VALUES ('105', '104', 'orders', 'Danh sách đặt hàng', null, '1', 'fa-cart-arrow-down', 'uetadmin/order/orders', '1');
INSERT INTO `resources` VALUES ('106', '104', 'listSale', 'Mã giảm giá', null, '2', 'fa-files-o', 'uetadmin/order/listSale', '1');
INSERT INTO `resources` VALUES ('107', '0', 'raovat', 'Quản lý rao vặt', null, '13', 'fa-bars', '', '1');
INSERT INTO `resources` VALUES ('108', '0', 'inuser', 'Ý kiến khách hàng', null, '0', 'fa-user-plus', 'uetadmin/inuser/categories', '0');
INSERT INTO `resources` VALUES ('109', '107', 'tagtinrao', 'Tags tin rao', null, '3', 'fa-tag', '', '0');
INSERT INTO `resources` VALUES ('110', '0', 'email', 'Quản lý email', null, '14', ' fa-envelope-o ', 'uetadmin/email/emails', '1');
INSERT INTO `resources` VALUES ('111', '0', 'support', 'Hỗ trợ  trực tuyến', null, '15', 'fa-life-ring', 'uetadmin/support/listSuport', '1');
INSERT INTO `resources` VALUES ('112', '95', 'store_shopping', 'Chuỗi cửa hàng', null, '5', 'fa-files-o', 'uetadmin/store/Ds_shopping', '0');
INSERT INTO `resources` VALUES ('113', '116', 'listBrand', 'Thương hiệu', null, '1', 'fa-circle-o', 'uetadmin/attribute/listBrand', '0');
INSERT INTO `resources` VALUES ('114', '116', 'listLocale', 'Xuất sứ', null, '2', 'fa-circle-o', 'uetadmin/attribute/listLocale', '0');
INSERT INTO `resources` VALUES ('115', '0', 'contact', 'Quản lý liên hệ', null, '10', 'fa-bars', 'uetadmin/contact/contacts', '1');
INSERT INTO `resources` VALUES ('116', '0', 'attribute', 'Thuộc tính sản phẩm', null, '5', 'fa-bars', '', '1');
INSERT INTO `resources` VALUES ('117', '108', 'cate_add', 'Thêm và Sửa', null, '2', '', '', '0');
INSERT INTO `resources` VALUES ('118', '108', 'delete_cat_once', 'Xóa', null, '3', '', '', '0');
INSERT INTO `resources` VALUES ('119', '108', 'categories', 'ý kiến khách hàng', null, '1', 'fa-files-o', 'uetadmin/inuser/categories', '0');
INSERT INTO `resources` VALUES ('120', '17', 'addmenu', 'Thêm - Sửa menu', null, '0', '', '', '0');
INSERT INTO `resources` VALUES ('121', '10', 'del_cat_once', 'Xóa danh mục sp', null, '10', '', '', '0');
INSERT INTO `resources` VALUES ('122', '29', 'add', 'Thêm -Sửa media', null, '3', '', '', '0');
INSERT INTO `resources` VALUES ('123', '29', 'delete_once', 'Xóa media', null, '4', '', '', '0');
INSERT INTO `resources` VALUES ('124', '29', 'cat_add', 'Thêm - Sửa danh mục media', null, '5', '', '', '0');
INSERT INTO `resources` VALUES ('125', '29', 'del_cat_once', 'Xóa danh mục media', null, '6', '', '', '0');
INSERT INTO `resources` VALUES ('126', '40', 'add', 'Thêm sửa video', null, '3', '', '', '0');
INSERT INTO `resources` VALUES ('127', '40', 'delete_once', 'Xóa video', null, '4', '', '', '0');
INSERT INTO `resources` VALUES ('128', '40', 'cat_add', 'Thêm danh mục video', null, '5', '', '', '0');
INSERT INTO `resources` VALUES ('129', '40', 'del_cat_once', 'Xóa danh mục video', null, '6', '', '', '0');
INSERT INTO `resources` VALUES ('130', '10', 'delete_once_question', 'Xóa hỏi đáp', null, '12', '', '', '0');
INSERT INTO `resources` VALUES ('131', '10', 'delete_once_comment', 'Xóa bình luận', null, '11', '', '', '0');
INSERT INTO `resources` VALUES ('132', '104', 'delete_once_orders', 'Xóa đơn hàng', null, '4', '', '', '0');
INSERT INTO `resources` VALUES ('133', '104', 'addSale', 'Thêm - Sửa mã giảm giá', null, '5', '', '', '0');
INSERT INTO `resources` VALUES ('134', '104', 'del_once_sale', 'Xóa mã giảm giá', null, '6', '', '', '0');
INSERT INTO `resources` VALUES ('135', '116', 'addbrand', 'Thêm - Sửa thương hiệu', null, '6', '', '', '0');
INSERT INTO `resources` VALUES ('136', '116', 'delete_brand_once', 'Xóa thương hiệu', null, '7', '', '', '0');
INSERT INTO `resources` VALUES ('137', '116', 'addlocale', 'Thêm - Sửa xuất sứ', null, '7', '', '', '0');
INSERT INTO `resources` VALUES ('138', '116', 'delete_locale_once', 'Xóa xuất sứ', null, '8', '', '', '0');
INSERT INTO `resources` VALUES ('139', '116', 'addcolor', 'Thêm - Sửa màu sắc', null, '9', '', '', '0');
INSERT INTO `resources` VALUES ('140', '116', 'delete_color_once', 'Xóa màu sắc', null, '10', '', '', '0');
INSERT INTO `resources` VALUES ('141', '116', 'addprice', 'Thêm - Sửa khoản giá', null, '11', '', '', '0');
INSERT INTO `resources` VALUES ('142', '116', 'delete_price_once', 'Xóa khoảng giá', null, '12', '', '', '0');
INSERT INTO `resources` VALUES ('143', '116', 'addoption', 'Thêm - Sửa kích thước', null, '12', '', '', '0');
INSERT INTO `resources` VALUES ('144', '116', 'delete_option_once', 'Xóa kích thước', null, '13', '', '', '0');
INSERT INTO `resources` VALUES ('145', '25', 'addnews', 'Thêm - Sửa tin tức', null, '4', '', '', '0');
INSERT INTO `resources` VALUES ('146', '25', 'delete_once_news', 'Xóa tin tức', null, '5', '', '', '0');
INSERT INTO `resources` VALUES ('147', '25', 'cat_add_news', 'Thêm - Sửa danh mục tin', null, '6', '', '', '0');
INSERT INTO `resources` VALUES ('148', '25', 'del_catnews_once', 'Xóa danh mục tin', null, '7', '', '', '0');
INSERT INTO `resources` VALUES ('149', '53', 'addbanner', 'Thêm - Sửa banner', null, '1', '', '', '0');
INSERT INTO `resources` VALUES ('150', '53', 'delete_Banner_once', 'Xóa banner', null, '2', '', '', '0');
INSERT INTO `resources` VALUES ('151', '39', 'addpage', 'Thêm - Sửa nội dung', null, '1', '', '', '0');
INSERT INTO `resources` VALUES ('152', '39', 'delete_page_once', 'Xóa nội dung', null, '2', '', '', '0');
INSERT INTO `resources` VALUES ('153', '115', 'delete', 'Xóa liên hệ', null, '1', '', '', '0');
INSERT INTO `resources` VALUES ('154', '107', 'add', 'Thêm - Sửa rao vặt', null, '4', '', '', '0');
INSERT INTO `resources` VALUES ('155', '107', 'delete_raovat_once', 'Xóa tin rao', null, '5', '', '', '0');
INSERT INTO `resources` VALUES ('156', '107', 'cat_add', 'Thêm - Sửa danh mục tin rao', null, '6', '', '', '0');
INSERT INTO `resources` VALUES ('157', '107', 'del_cattinrao_once', 'Xóa danh mục tin rao', null, '7', '', '', '0');
INSERT INTO `resources` VALUES ('158', '110', 'delete', 'Xóa email', null, '1', '', '', '0');
INSERT INTO `resources` VALUES ('159', '111', 'add', 'Thêm - Sửa hỗ trợ trực tuyến', null, '1', '', '', '0');
INSERT INTO `resources` VALUES ('160', '111', 'delete_support_once', 'Xóa hỗ trợ trực tuyến', null, '2', '', '', '0');
INSERT INTO `resources` VALUES ('161', '33', 'delete_users_once', 'Xóa thành viên', null, '1', '', '', '0');
INSERT INTO `resources` VALUES ('162', '0', 'province', 'Danh sách quan huyện', null, '18', '', '', '0');
INSERT INTO `resources` VALUES ('163', '33', 'add_users', 'Thêm thành viên quan trị', null, '1', '', 'uetadmin/users/add_users', '0');
INSERT INTO `resources` VALUES ('164', '33', 'delete_users_once', 'Xóa thành viên quản trị', null, '10', '', '', '0');
INSERT INTO `resources` VALUES ('165', '33', 'listuser_admin', 'Danh sách tài khoản quản trị', null, '0', '', 'uetadmin/users/listuser_admin', '1');
INSERT INTO `resources` VALUES ('166', '33', 'listusers', 'Danh sách thành viên', null, '0', '', 'uetadmin/users/listusers', '1');
INSERT INTO `resources` VALUES ('167', '17', 'menulist', 'Danh sách menu', null, '1', '', 'uetadmin/menu/menulist', '0');
INSERT INTO `resources` VALUES ('168', '53', 'banners', 'Danh sách banner', null, '0', '', 'uetadmin/imageupload/banners', '0');
INSERT INTO `resources` VALUES ('169', '39', 'pagelist', 'Danh sách nội dung', null, '0', '', 'uetadmin/pages/pagelist', '0');
INSERT INTO `resources` VALUES ('170', '110', 'emails', 'Danh sách email', null, '0', '', 'uetadmin/email/emails', '0');
INSERT INTO `resources` VALUES ('171', '115', 'contacts', 'Danh sách liên hệ', null, '0', '', 'uetadmin/contact/contacts', '1');
INSERT INTO `resources` VALUES ('172', '111', 'listSuport', 'Danh sách support', null, '0', '', 'uetadmin/support/listSuport', '0');
INSERT INTO `resources` VALUES ('173', '0', 'comment', 'Quản lý bình luận', null, '7', 'fa-comments-o', '', '0');
INSERT INTO `resources` VALUES ('174', '0', 'tag', 'Quản lý thẻ tag', null, '6', 'fa-tags', '', '0');
INSERT INTO `resources` VALUES ('175', '174', 'listnew', 'Thẻ tags tin tức', null, '2', 'fa-tag', 'uetadmin/tag/listnew', '0');
INSERT INTO `resources` VALUES ('177', '95', 'setup_product', ' Cấu hình sản phẩm', null, '20', 'fa-gears', 'uetadmin/admin/setup_product', '1');

-- ----------------------------
-- Table structure for site_log
-- ----------------------------
DROP TABLE IF EXISTS `site_log`;
CREATE TABLE `site_log` (
  `site_log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_of_visits` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `requested_url` tinytext CHARACTER SET utf8,
  `referer_page` tinytext CHARACTER SET utf8,
  `page_name` tinytext CHARACTER SET utf8,
  `query_string` tinytext CHARACTER SET utf8,
  `user_agent` tinytext CHARACTER SET utf8,
  `is_unique` tinyint(1) DEFAULT '0',
  `access_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `visits_count` int(11) DEFAULT '0',
  PRIMARY KEY (`site_log_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1576 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of site_log
-- ----------------------------
INSERT INTO `site_log` VALUES ('1575', '1', '::1', '/Uet_lamgiau/uetadmin/product/add', 'http://localhost/Uet_lamgiau/uetadmin/product/products', 'product/add', 'duct/add', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-12 15:18:58', '0');
INSERT INTO `site_log` VALUES ('1573', '1', '::1', '/Uet_lamgiau/uetadmin', '', 'defaults/index', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-12 15:18:47', '0');
INSERT INTO `site_log` VALUES ('1574', '1', '::1', '/Uet_lamgiau/uetadmin/product/products', 'http://localhost/Uet_lamgiau/uetadmin', 'product/products', 'products', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-12 15:18:56', '0');
INSERT INTO `site_log` VALUES ('1572', '1', '::1', '/Uet_lamgiau/', '', 'home/index', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-12 15:18:40', '0');
INSERT INTO `site_log` VALUES ('1571', '1', '::1', '/Uet_lamgiau/website/Uet_website', '', 'Uet_website/index', 'e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-12 14:47:58', '0');
INSERT INTO `site_log` VALUES ('1569', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite', 'http://localhost/Uet_lamgiau/website/Uet_content', 'Uet_createwebsite/index', 'e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:39', '0');
INSERT INTO `site_log` VALUES ('1570', null, '::1', '/Uet_lamgiau/uetadmin', '', 'defaults/index', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-12 14:47:48', '1');
INSERT INTO `site_log` VALUES ('1568', '1', '::1', '/Uet_lamgiau/website/Uet_content', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite', 'Uet_content/index', 't', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:38', '0');
INSERT INTO `site_log` VALUES ('1567', '1', '::1', '/Uet_lamgiau/website/Uet_content_mid/index2/5', 'http://localhost/Uet_lamgiau/website/Uet_content', 'Uet_content_mid/index2', '/index2/5', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:37', '0');
INSERT INTO `site_log` VALUES ('1566', '1', '::1', '/Uet_lamgiau/website/Uet_content', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite', 'Uet_content/index', 't', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:36', '0');
INSERT INTO `site_log` VALUES ('1565', '1', '::1', '/Uet_lamgiau/website/Uet_content_leftright/index2/7', 'http://localhost/Uet_lamgiau/website/Uet_content', 'Uet_content_leftright/index2', '/index2/7', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:34', '0');
INSERT INTO `site_log` VALUES ('1564', '1', '::1', '/Uet_lamgiau/website/Uet_content', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite', 'Uet_content/index', 't', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:32', '0');
INSERT INTO `site_log` VALUES ('1563', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite', 'http://localhost/Uet_lamgiau/website/Uet_website', 'Uet_createwebsite/index', 'e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:21', '0');
INSERT INTO `site_log` VALUES ('1562', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite', 'Uet_createwebsite/content', 'content', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:13', '0');
INSERT INTO `site_log` VALUES ('1561', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite', 'http://localhost/Uet_lamgiau/website/Uet_website', 'Uet_createwebsite/index', 'e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:11', '0');
INSERT INTO `site_log` VALUES ('1560', '1', '::1', '/Uet_lamgiau/website/Uet_website', '', 'Uet_website/index', 'e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:50:08', '0');
INSERT INTO `site_log` VALUES ('1559', null, '::1', '/Uet_lamgiau/uetadmin', '', 'defaults/index', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 19:49:54', '1');
INSERT INTO `site_log` VALUES ('1558', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:55:05', '0');
INSERT INTO `site_log` VALUES ('1557', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/add_module', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/add_module', '_module', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:54:58', '0');
INSERT INTO `site_log` VALUES ('1556', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_library_item', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_library_item', 'ry_item', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:54:28', '0');
INSERT INTO `site_log` VALUES ('1555', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:54:22', '0');
INSERT INTO `site_log` VALUES ('1554', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:50:00', '0');
INSERT INTO `site_log` VALUES ('1553', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:49:02', '0');
INSERT INTO `site_log` VALUES ('1552', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:48:59', '0');
INSERT INTO `site_log` VALUES ('1551', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:48:34', '0');
INSERT INTO `site_log` VALUES ('1550', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:48:33', '0');
INSERT INTO `site_log` VALUES ('1549', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:45:32', '0');
INSERT INTO `site_log` VALUES ('1548', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:45:31', '0');
INSERT INTO `site_log` VALUES ('1547', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:44:47', '0');
INSERT INTO `site_log` VALUES ('1546', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:44:44', '0');
INSERT INTO `site_log` VALUES ('1545', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:36:13', '0');
INSERT INTO `site_log` VALUES ('1544', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:36:08', '0');
INSERT INTO `site_log` VALUES ('1543', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_library_item', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_library_item', 'ry_item', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:33:21', '0');
INSERT INTO `site_log` VALUES ('1542', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:33:20', '0');
INSERT INTO `site_log` VALUES ('1541', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:33:18', '0');
INSERT INTO `site_log` VALUES ('1540', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:31:43', '0');
INSERT INTO `site_log` VALUES ('1539', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_library_item', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_library_item', 'ry_item', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:31:02', '0');
INSERT INTO `site_log` VALUES ('1538', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:31:00', '0');
INSERT INTO `site_log` VALUES ('1537', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:30:58', '0');
INSERT INTO `site_log` VALUES ('1536', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:29:48', '0');
INSERT INTO `site_log` VALUES ('1535', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_library_item', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_library_item', 'ry_item', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:29:36', '0');
INSERT INTO `site_log` VALUES ('1534', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:28:59', '0');
INSERT INTO `site_log` VALUES ('1533', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_library_item', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_library_item', 'ry_item', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:28:57', '0');
INSERT INTO `site_log` VALUES ('1532', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:28:56', '0');
INSERT INTO `site_log` VALUES ('1531', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:28:54', '0');
INSERT INTO `site_log` VALUES ('1530', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_library_item', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_library_item', 'ry_item', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:28:08', '0');
INSERT INTO `site_log` VALUES ('1529', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:27:41', '0');
INSERT INTO `site_log` VALUES ('1528', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/add_module', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/add_module', '_module', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:27:32', '0');
INSERT INTO `site_log` VALUES ('1527', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/select_contentdetail', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'Uet_createwebsite/select_contentdetail', 'tdetail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:27:31', '0');
INSERT INTO `site_log` VALUES ('1526', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content_detail.html', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite/content', 'Uet_createwebsite/content_detail', '_detail', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:27:27', '0');
INSERT INTO `site_log` VALUES ('1525', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite/content', 'http://localhost/Uet_lamgiau/website/Uet_createwebsite', 'Uet_createwebsite/content', 'content', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:27:21', '0');
INSERT INTO `site_log` VALUES ('1523', '1', '::1', '/Uet_lamgiau/website/Uet_website', '', 'Uet_website/index', 'e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:27:16', '0');
INSERT INTO `site_log` VALUES ('1524', '1', '::1', '/Uet_lamgiau/website/Uet_createwebsite', 'http://localhost/Uet_lamgiau/website/Uet_website', 'Uet_createwebsite/index', 'e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:27:19', '0');
INSERT INTO `site_log` VALUES ('1522', null, '::1', '/Uet_lamgiau/uetadmin', '', 'defaults/index', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '0', '2018-06-10 08:27:06', '1');

-- ----------------------------
-- Table structure for site_option
-- ----------------------------
DROP TABLE IF EXISTS `site_option`;
CREATE TABLE `site_option` (
  `id` int(11) NOT NULL,
  `coppy_right` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `site_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `slogan` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `link_instagram` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `site_logo` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `site_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site_title_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site_keyword` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site_keyword_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site_description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `link_sky` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `link_printer` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `link_linkedin` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `site_email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `site_fanpage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site_video` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `WM_text` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `WM_color` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `WM_size` int(10) DEFAULT NULL,
  `hotline1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `hotline2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `hotline3` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `link_tt` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `favicon` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `company_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `shipping` text CHARACTER SET utf8,
  `site_promo` text CHARACTER SET utf8,
  `thanhtoan_tienmat` text CHARACTER SET utf8,
  `thanhtoan_chuyenkhoan` text CHARACTER SET utf8,
  `hdfMap` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `map_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `map_adrdress` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `map_phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dia_chi_timkiem` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT '1',
  `link_gg` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_youtube` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `face_id` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeopen` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `chat` text CHARACTER SET utf8,
  `site_logo_footer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `map_iframe` text CHARACTER SET utf8 NOT NULL,
  `input_text_1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `map_footer` text COLLATE utf8_unicode_ci NOT NULL,
  `config_pro` text COLLATE utf8_unicode_ci NOT NULL,
  `config_pro_content` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of site_option
-- ----------------------------
INSERT INTO `site_option` VALUES ('1', 'Bản quyền thuộc về Công ty TNHH gỗ Đại Long ', 'CÔNG TY CỔ PHẦN CÔNG NGHỆ QTSaaaaaaa', 'KPIMEX IMPORT EXPORT & TRADING CO., LTD', null, 'upload/img/logo/logo7.png', 'CÔNG TY CỔ PHẦN CÔNG NGHỆ QTS VIỆT NAMaaaaaa', null, '', '0', '', null, null, null, ' thudoct@gmail.com', null, 'uI2wcf05wq0', null, null, null, '0975 195 112', null, null, '', null, 'upload/img/logo/logo8.png', null, '<p>Địa chỉ: : Số 8, Thi&ecirc;n Đức, Y&ecirc;n Vi&ecirc;n, Gia L&acirc;m, H&agrave; Nội.<br />\r\nĐiện thoại: 043 9611 911 - 0982 629 134 - 0979 701 999<br />\r\nEmail: <a href=\"\">Info@noithatphuan.com.vn</a> - <a href=\"\">Https://noithatphuan.com.vn</a><br />\r\nM&atilde; số thuế: 0106288684<br />\r\nNg&agrave;y cấp: 22/08/2013 Nơi cấp: Chi cục Thuế Huyện Gia L&acirc;m<br />\r\nNgười đại diện: &Ocirc;ng Tạ Tuấn Hiệp - Chức vụ: Gi&aacute;m đốc</p>\r\n', null, null, null, '(21.0137956, 105.76945469999998)', 'Công ty cổ phần dịch vụ & thương mại Thủ Đô', 'Số 58 Phố Duy Tân – Dịch Vọng Hậu – Cầu Giấy - HN', ' 0984086608', '42 Lê Quang đạo, Nam Từ Liêm', 'vi', null, 'https://www.youtube.com/channel/UCHXYopwqVJ9u4_EnUCmhkHQ', null, 'liên hệ để được hỗ trợ ưu đãi tốt nhất tại FIONA VIỆT TRÌ', null, 'upload/img/logo/Logo_doctors1.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14896.112114794629!2d105.76454397273433!3d21.031564475947746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454bab8c5e73b%3A0x15f3308da6ba66c4!2zTeG7uSDEkMOsbmggMiwgVOG7qyBMacOqbSwgSGFub2ksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1510635467740\" width=\"100%\" height=\"250\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', null, 'websiteqts.com', '<div id=\"fb-root\"></div>\r\n\r\n<script>(function(d, s, id) {\r\n\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n\r\n  if (d.getElementById(id)) return;\r\n\r\n  js = d.createElement(s); js.id = id;\r\n\r\n  js.src = \"//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=126821687974504\";\r\n\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n\r\n}(document, \'script\', \'facebook-jssdk\'));</script>', '[]', '[{\"content\":\"\",\"name\":\"Chi ti\\u1ebft s\\u1ea3n ph\\u1ea9m\",\"type\":\"textarea\",\"sort\":\"\"},{\"content\":\"\",\"name\":\"th\\u00f4ng s\\u1ed1 k\\u1ef9 thu\\u1eadt\",\"type\":\"textarea\",\"sort\":\"2\"},{\"content\":\"\",\"name\":\"M\\u00e3 s\\u1ea3n ph\\u1ea9m\",\"type\":\"text\",\"sort\":\"\"}]', '1');
INSERT INTO `site_option` VALUES ('2', null, 'JSC polygon media', '', null, 'upload/img/logo4.png', '', null, '', '0', '', '0', null, null, 'hanhnh@polygonmedia.vn', '', 'uI2wcf05wq0', '', '', '0', '', '', '0', '', '', '0', null, '', '', null, null, '(21.0218044, 105.79087200000004)', 'Công ty', '', '', 'Yên hòa', 'en', '', '', '', '', '', null, '', null, '', '', '', '', '1');
INSERT INTO `site_option` VALUES ('3', '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', 'config', '0', '1', '0', '1', '0', '1', '1', '0', '1', '1', '1', '1', '0');
INSERT INTO `site_option` VALUES ('4', 'coppy right', 'tên đơn vị', 'slogan', 'Instagram', null, 'Tiêu đề website', null, null, null, null, 'link skype', 'link printer', 'link linkedin', null, 'fanpage facebook', 'Video (Youtube)', 'Chữ Nổi Warter Mark', 'Màu Chữ (Hex Color VD : #ed1c2', '1', 'điện thoại', 'fax', 'điên thoại bàn', 'địa chỉ', 'link twester', null, null, 'giao hàng', 'khuyến mại', null, null, null, null, null, null, null, 'conf_text', 'link google', null, 'id ap facebook', 'thời gian mở cửa', 'mã chát online', 'logo chân trang', 'Mã nhúng bản đồ chân trang', 'mã số thuê', 'tên miền', 'mã nhúng javascript', '', '', '0');

-- ----------------------------
-- Table structure for staticpage
-- ----------------------------
DROP TABLE IF EXISTS `staticpage`;
CREATE TABLE `staticpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` char(10) COLLATE utf8_unicode_ci DEFAULT '1',
  `home` tinyint(1) DEFAULT '0',
  `hot` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `contact_page` tinyint(1) DEFAULT '0',
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `page_footer` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of staticpage
-- ----------------------------
INSERT INTO `staticpage` VALUES ('31', 'Giới Thiệu', 'gioi-thieu', '<p>C&ocirc;ng ty Cổ phần C&ocirc;ng nghệ QTS Việt Nam (QTS) l&agrave; nh&agrave; cung cấp dịch vụ c&ocirc;ng nghệ th&ocirc;ng tin chuy&ecirc;n nghiệp v&agrave; đội ngũ chuy&ecirc;n gia cao cấp. QTS Việt Nam l&agrave; một trong những đơn vị</p>\r\n', '<p style=\"margin-left:0px; margin-right:0px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">C&ocirc;ng ty cổ phần c&ocirc;ng nghệ QTS Việt Nam ( QTS). Được x&acirc;y dựng n&ecirc;n từ một tập thể những c&aacute;n bộ quản l&yacute; chuy&ecirc;n nghiệp được đ&agrave;o tạo vững chắc trong c&ocirc;ng t&aacute;c quản trị kinh doanh v&agrave; c&ocirc;ng nghệ cao.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">C&aacute;n bộ kỹ thuật: c&oacute; tay nghề cao được đ&agrave;o tạo từ c&aacute;c trường danh tiếng v&agrave; c&oacute; thể l&agrave;m chủ được c&ocirc;ng nghệ ti&ecirc;n tiến nhất, lu&ocirc;n lu&ocirc;n đ&oacute;n đầu c&ocirc;ng nghệ trong lĩnh vực c&ocirc;ng nghệ th&ocirc;ng tin &aacute;p dụng hiệu quả c&aacute;c sản phẩm v&agrave;o thực tế.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">C&aacute;n bộ kinh doanh: năng động, hiệu quả trong c&ocirc;ng t&aacute;c t&igrave;m kiếm kh&aacute;ch h&agrave;ng mới v&agrave; với phương ch&acirc;m &ldquo;H&atilde;y để ch&uacute;ng t&ocirc;i l&agrave;m h&agrave;i l&ograve;ng qu&yacute; kh&aacute;ch &rdquo; đội ngũ c&aacute;n bộ kinh doanh đ&atilde; tư vấn v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng với dịch vụ c&ocirc;ng nghệ th&ocirc;ng tin tốt nhất</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">Đội ngũ chuy&ecirc;n gia quản lỹ, nghi&ecirc;n cứu v&agrave; ph&aacute;t triển thị trường, Cập nhật thường xuy&ecirc;n c&aacute;c th&ocirc;ng tin văn bản quy phạm ph&aacute;p luật của nh&agrave; nước trong c&ocirc;ng t&aacute;c quản l&yacute; nh&agrave; nước đảm bảo tu&acirc;n thủ chặt chẽ c&aacute;c quy định của Ch&iacute;nh phủ, Bộ chủ quản v&agrave; ph&ugrave; hợp với c&ocirc;ng t&aacute;c quản l&yacute; tại c&aacute;c địa phương</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><strong><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">Phương ch&acirc;m &ndash; Sứ mệnh</span></span></strong></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><strong><em><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">Phương ch&acirc;m:</span></span></em></strong><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">Với phương ch&acirc;m &ldquo; H&atilde;y để ch&uacute;ng t&ocirc;i l&agrave;m h&agrave;i l&ograve;ng qu&yacute; kh&aacute;ch&rdquo; C&ocirc;ng ty cổ phần c&ocirc;ng nghệ QTS Việt Nam lu&ocirc;n lu&ocirc;n đưa ra c&aacute;c giải ph&aacute;p mới nhất, tư vấn v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng với dịch vụ tốt nhất.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><strong><em><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">Sứ mệnh:</span></span></em></strong></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\">&nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.25in; margin-right:0in; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><span style=\"font-size:10pt\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">L&agrave; c&ocirc;ng ty Tư vấn v&agrave; Cung cấp giải ph&aacute;p phần mềm số một tại việt nam.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.25in; margin-right:0in; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><span style=\"font-size:10pt\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">Được kh&aacute;ch h&agrave;ng đ&aacute;nh gi&aacute; sản phẩm hiệu quả v&agrave; chi ph&iacute; tối ưu.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.25in; margin-right:0in; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><span style=\"font-size:10pt\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">C&ocirc;ng ty c&oacute; văn h&oacute;a hiện đại</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.25in; margin-right:0in; text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:Arial\"><span style=\"background-color:#ffffff\"><span style=\"font-size:10pt\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\">C&aacute;n bộ c&oacute; thu nhập gấp đ&ocirc;i mặt bằng chung của thị trường cho th&agrave;nh vi&ecirc;n của m&igrave;nh&nbsp;</span></span></span></span></span></span></p>\r\n', '', 'vi', '1', '1', '1', '0', '', '', '', '0', '1');
INSERT INTO `staticpage` VALUES ('32', 'Mua từ xa', 'mua-tu-xa', '', '', null, 'vi', '1', null, null, '0', '', '', '', '0', '0');
INSERT INTO `staticpage` VALUES ('33', 'Chứng nhận', 'chung-nhan', '', '', null, 'vi', '1', null, null, '0', '', '', '', '0', '0');
INSERT INTO `staticpage` VALUES ('34', 'Đại lý', 'dai-ly', '', '<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:16.0pt\"><span style=\"color:black\">C&Ocirc;NG TY CỔ PHẦN C&Ocirc;NG NGHỆ QTS VIỆT NAM</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"color:black\">===o0o===</span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:11.0pt\"><img src=\"/upload/images/Zapo%2011.png\" style=\"height:207px; width:207px\" /></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:18.0pt\"><span style=\"color:#7030a0\">CH&Iacute;NH S&Aacute;CH ĐẠI L&Yacute; CỦA QTS</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\">&nbsp;</p>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><em><span style=\"font-size:14.0pt\"><span style=\"color:#7030a0\">Hỗ trợ PR &amp; Marketing</span></span></em></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Được Tạo dựng v&agrave; thiết kế hỗ trợ 1 website thương hiệu ri&ecirc;ng cho đại l&yacute;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Được cấp Giấy chứng nhận Đại L&yacute; ch&iacute;nh thức</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Qu&yacute; đại l&yacute; được hỗ trợ về thiết kế catalogue, tờ rơi, banner... theo c&aacute;c chương tr&igrave;nh</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Qu&yacute; đại l&yacute; được tham gia tất cả c&aacute;c chương tr&igrave;nh khuyến mại v&agrave; th&uacute;c đẩy cung cấp dịch vụ tới kh&aacute;ch h&agrave;ng</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Qu&yacute; đại l&yacute; được update th&ocirc;ng tin về gi&aacute; cả v&agrave; th&ocirc;ng tin về c&aacute;c g&oacute;i sản phẩm dịch vụ, ch&iacute;nh s&aacute;ch của QTS, c&aacute;c chương tr&igrave;nh Marketing v&agrave; th&uacute;c đẩy b&aacute;n h&agrave;ng</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Được giới thiệu ch&iacute;nh thức tr&ecirc;n trang chủ website c&ocirc;ng ty QTS v&agrave; Giaodiendep.vn</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Hưởng mức chiết khấu tăng dần tối thiểu từ 10% đến hơn 65% gi&aacute; trị hợp đồng</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Kh&ocirc;ng c&oacute; bất kỳ rủi ro n&agrave;o khi tham gia l&agrave;m đại l&yacute; ch&iacute;nh thức với ch&uacute;ng t&ocirc;i</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Kh&ocirc;ng phải đặt cọc số tiền cho c&ocirc;ng ty QTS</span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:36pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<ol start=\"2\">\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><em><span style=\"font-size:14.0pt\"><span style=\"color:#7030a0\">Hỗ trợ kỹ thuật</span></span></em></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:36pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">Được đ&agrave;o tạo về nghiệp vụ tư vấn v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng</span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">Qu&yacute; đại l&yacute; sẽ được hỗ trợ kỹ thuật v&agrave; CSKH qua điện thoại, email, yahoo, skype, temview....</span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">Hỗ trợ CSKH của đại l&yacute; trong suốt thời gian kh&aacute;ch h&agrave;ng sử dụng dịch vụ</span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">Sản phẩm website được bảo h&agrave;nh vĩnh viễn</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:36pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<ol start=\"3\">\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><em><span style=\"font-size:14.0pt\"><span style=\"color:#7030a0\">Hỗ trợ lợi &iacute;ch đại l&yacute; </span></span></em></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">- &nbsp; Kh&ocirc;ng cần đầu tư vốn m&agrave; lợi nhuận cao.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">- &nbsp; Được hưởng mức chiết khấu cao</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">- &nbsp; Kh&ocirc;ng chịu tr&aacute;ch nhiệm về doanh số của c&ocirc;ng ty.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">- &nbsp; Kh&ocirc;ng bị r&agrave;ng buộc thời gian v&agrave; kh&ocirc;ng gian hoạt động</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">-&nbsp;&nbsp; Được tham gia c&aacute;c kh&oacute;a đ&agrave;o tạo, huấn luyện cơ bản v&agrave; n&acirc;ng cao c&aacute;c kiến thức về website</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">- &nbsp; Được hỗ trợ về mặt kỹ thuật v&agrave; mỹ thuật trong qu&aacute; tr&igrave;nh tiếp x&uacute;c v&agrave; phục vụ kh&aacute;ch h&agrave;ng</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">- Được cung cấp bảng gi&aacute; thiết kế website v&agrave; c&aacute;c t&agrave;i liệu kỹ thuật cần thiết kh&aacute;c</span></span></span></p>\r\n\r\n<ol start=\"4\">\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><em><span style=\"font-size:14.0pt\"><span style=\"color:#7030a0\">Tr&aacute;ch nhiệm của đại l&yacute;</span></span></em></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:36pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Thu thập c&aacute;c th&ocirc;ng tin cần thiết của kh&aacute;c h&agrave;ng để cung cấp cho QTS tiến h&agrave;nh thiết kế website.</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Th&ocirc;ng b&aacute;o cho QTS&nbsp; c&aacute;c vấn đề nảy sinh về kỹ thuật, y&ecirc;u cầu mới của kh&aacute;ch h&agrave;ng.</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Phản hồi &yacute; kiến kh&aacute;ch h&agrave;ng về vấn đề website cho QTS</span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:36pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<ol start=\"5\">\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><em><span style=\"color:#8064a2\">Bảng triết khấu % đại l&yacute;</span></em></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<table border=\"1\" cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:solid black 1.0pt; width:478.8pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"6\" style=\"height:14.6pt; width:478.8pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">BẢNG PH&Acirc;N CẤP&nbsp; ĐẠI L&Yacute; V&Agrave; TỶ LỆ CHIẾT KHẤU C&Ocirc;NG TY QTS</span></span></strong></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\" style=\"height:20.65pt; width:96.6pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Đại l&yacute;</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:62.95pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Cấp 1</span></span></strong></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:86.6pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Cấp 2</span></span></strong></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:86.6pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Cấp 3</span></span></strong></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:80.25pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Cấp 4</span></span></strong></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:65.8pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Cấp 5</span></span></strong></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.65pt; width:62.95pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&lt;=15 tr</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:86.6pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">16tr&lt;x&lt;=30tr</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:86.6pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">31tr&lt;x&lt;=50tr</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:80.25pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">51tr&lt;x&lt;120tr</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:20.65pt; width:65.8pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Tr&ecirc;n 120 tr</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:15.3pt; width:96.6pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">L&agrave;m mới</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:15.3pt; width:62.95pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">20%</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:15.3pt; width:86.6pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">35%</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:15.3pt; width:86.6pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">45%</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:15.3pt; width:80.25pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">55%</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"height:15.3pt; width:65.8pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">65%</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:16.0pt\">Mọi vấn đề cần li&ecirc;n hệ, Qu&yacute; đại l&yacute; xin li&ecirc;n hệ với ch&uacute;ng t&ocirc;i</span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:16.0pt\"><span style=\"color:#0070c0\">C&Ocirc;NG TY CỔ PHẦN C&Ocirc;NG NGHỆ QTS VIỆT NAM</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:#0070c0\">Địa chỉ: 42 L&ecirc; Quang Đạo, Ph&uacute; Đ&ocirc;, Nam Từ Li&ecirc;m, H&agrave; Nội</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:#0070c0\">Điện thoại :&nbsp; (024) 3785 8656&nbsp; - Hotline: </span></span><strong><span style=\"font-size:14.0pt\"><span style=\"color:red\">0904 931 933 - 0975 195 112 </span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:#0070c0\">Email: <a href=\"mailto:info@qts.com.vn\" style=\"color:blue; text-decoration:underline\">info@qts.com.vn</a> </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:#0070c0\">Website: http://qts.vn &ndash; http://giaodiendep.vn &ndash;http://webqts.com</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:36pt; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:20.0pt\"><span style=\"color:#0070c0\">Xin ch&acirc;n th&agrave;nh cảm ơn</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"color:#0070c0\">===o0o===</span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', null, 'vi', '1', null, null, '0', '', '', '', '0', '0');
INSERT INTO `staticpage` VALUES ('36', 'Hỏi đáp về sản phẩm ', 'hoi-dap-ve-san-pham', '', '<p>T&ocirc;i c&oacute; thể đến xem h&agrave;ng trước tại QTS kh&ocirc;ng?</p>\r\n\r\n<p>Kh&ocirc;ng bạn nh&eacute;! tất cả sản phẩm tr&ecirc;n QTS l&agrave; do c&aacute;c xưởng từ TQ đăng b&aacute;n. Do vậy, bạn phải đặt h&agrave;ng v&agrave; thanh to&aacute;n th&igrave; QTS mới chuyển h&agrave;ng về cho bạn.</p>\r\n\r\n<p>&nbsp;L&agrave;m sao để ph&acirc;n biệt được sản phẩm c&ugrave;ng shop, kh&aacute;c shop?</p>\r\n\r\n<p>Khi mở một link sản phẩm bất kỳ, bạn sẽ thấy th&ocirc;ng tin người b&aacute;n ở g&oacute;c tr&aacute;i của m&agrave;n h&igrave;nh chi tiết sản phẩm, bạn nhấp chuột v&agrave;o &quot;Danh s&aacute;ch sản phẩm&quot; để xem c&aacute;c sản phẩm kh&aacute;c của c&ugrave;ng shop đ&oacute;. Bạn vui l&ograve;ng xem th&ecirc;m hướng dẫn ở đ&acirc;y để biết th&ecirc;m chi tiết.</p>\r\n\r\n<p>&nbsp;T&ocirc;i đang xem một sản phẩm, liệu t&ocirc;i c&oacute; thể t&igrave;m người b&aacute;n kh&aacute;c với gi&aacute; rẻ hơn kh&ocirc;ng?</p>\r\n\r\n<p>C&oacute; thể bạn ạ! ở QTS, th&ocirc;ng thường một sản phẩm sẽ c&oacute; nhiều người c&ugrave;ng b&aacute;n với c&aacute;c mức gi&aacute; kh&aacute;c nhau. Để t&igrave;m mức gi&aacute; rẻ hơn cho sản phẩm bạn quan t&acirc;m, bạn sử dụng chức năng &quot;T&igrave;m kiếm&quot; bằng c&aacute;ch nhập t&ecirc;n ngắn gọn của sản phẩm bạn đang xem v&agrave;o &ocirc; t&igrave;m kiếm để lọc ra những sản phẩm giống như vậy hiện đang b&aacute;n tr&ecirc;n to&agrave;n trang. Từ đ&oacute;, c&oacute; thể bạn sẽ t&igrave;m được người b&aacute;n rẻ hơn. Bạn xem th&ecirc;m Hướng dẫn t&igrave;m kiếm sản phẩm bạn xem ở đ&acirc;y nh&eacute;!</p>\r\n\r\n<p>&nbsp;L&agrave;m sao để t&ocirc;i nhận biết được sản phẩm n&agrave;o l&agrave; b&aacute;n lẻ/b&aacute;n bu&ocirc;n?</p>\r\n\r\n<p>Để ph&acirc;n biệt sản phẩm b&aacute;n lẻ/b&aacute;n bu&ocirc;n, bạn dựa v&agrave;o th&ocirc;ng tin quy định ở từng link sản phẩm. Cụ thể như:</p>\r\n\r\n<p>- số lượng tối thiểu đặt mua;</p>\r\n\r\n<p>- phương thức b&aacute;n h&agrave;ng của shop;</p>\r\n\r\n<p>mỗi người b&aacute;n (shop), mỗi sản phẩm c&oacute; quy định b&aacute;n h&agrave;ng kh&aacute;c nhau. Bạn xem c&oacute; thể xem th&ecirc;m hướng dẫn ở đ&acirc;y!</p>\r\n\r\n<p>L&agrave;m sao để ph&acirc;n biệt được người b&aacute;n uy t&iacute;n?</p>\r\n\r\n<p>Để đ&aacute;nh gi&aacute; uy t&iacute;n của người b&aacute;n, QTS c&oacute; đưa ra mức xếp hạng người bạn dựa tr&ecirc;n số lượng giao dịch th&agrave;nh c&ocirc;ng v&agrave; doanh số b&aacute;n h&agrave;ng t&iacute;ch lũy. Xếp h&agrave;ng người bạn được thể hiện bằng c&aacute;c biểu tượng ở phần &quot;Th&ocirc;ng tin người b&aacute;n&quot;.</p>\r\n\r\n<p>T&ocirc;i thấy c&oacute; nhiều người c&ugrave;ng b&aacute;n một loại sản phẩm, l&agrave;m sao t&ocirc;i c&oacute; thể ph&acirc;n biệt v&agrave; n&ecirc;n mua của Shop n&agrave;o?</p>\r\n\r\n<p>Trong trường hợp c&oacute; nhiều shop c&ugrave;ng b&aacute;n một loại sản phẩm, bạn c&oacute; thể dựa v&agrave;o c&aacute;c ti&ecirc;u ch&iacute; sau đ&acirc;y để lựa chọn người b&aacute;n ph&ugrave; hợp:</p>\r\n\r\n<p>- Số lượng sản phẩm đ&atilde; được giao dịch;</p>\r\n\r\n<p>- Xếp hạng uy t&iacute;n của người b&aacute;n;</p>\r\n\r\n<p>- Mức gi&aacute; sản phẩm;</p>\r\n\r\n<p>T&ocirc;i c&oacute; thể đặt mua với số lượng &iacute;t hơn quy định tối thiểu kh&ocirc;ng?</p>\r\n\r\n<p>Rất tiếc l&agrave; kh&ocirc;ng bạn nh&eacute;! Đ&acirc;y l&agrave; quy định của xưởng tại TQ, QTS kh&ocirc;ng thay đổi được c&aacute;c quy định n&agrave;y. Bạn vui l&ograve;ng chọn sản phẩm ở shop cho ph&eacute;p mua với số lượng bạn mong muốn nh&eacute;!</p>\r\n\r\n<p>QTS c&oacute; thể hướng dẫn cho t&ocirc;i c&aacute;ch t&igrave;m những sản phẩm cho ph&eacute;p mua lẻ kh&ocirc;ng?</p>\r\n\r\n<p>Để t&igrave;m những sản phẩm cho ph&eacute;p mua lẻ, bạn sử dụng chức năng &quot;T&igrave;m kiếm&quot;, sau đ&oacute; bỏ đ&aacute;nh dấu ở &ocirc; &quot;B&aacute;n bu&ocirc;n&quot; trong trang kết quả t&igrave;m kiếm, hệ thống sẽ chỉ giữ lại cho bạn những sản phẩm cho ph&eacute;p mua lẻ. Bạn xem th&ecirc;m hướng dẫn ở đ&acirc;y để thực hiện.</p>\r\n\r\n<p>Cho t&ocirc;i hỏi, sản phẩm t&ocirc;i nhận được c&oacute; được giống như h&igrave;nh ảnh ở tr&ecirc;n website QTS kh&ocirc;ng?</p>\r\n\r\n<p>C&oacute; giống bạn nh&eacute;! Tuy nhi&ecirc;n, đ&ocirc;i khi c&oacute; thể c&oacute; những kh&aacute;c biệt nhất định do:</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm tr&ecirc;n web đ&atilde; được chỉnh sửa để cho đẹp hơn;</p>\r\n\r\n<p>- Người mẫu sử dụng tr&ecirc;n ảnh đ&atilde; được lựa chọn cẩn thận để ph&ugrave; hợp với k&iacute;ch thước v&agrave; phong c&aacute;ch của sản phẩm đ&oacute;;</p>\r\n\r\n<p>- H&igrave;nh ảnh tr&ecirc;n web l&agrave; h&igrave;nh ảnh gốc của ch&iacute;nh h&atilde;ng, nhưng sản phẩm bạn mua l&agrave; do xưởng tự sản xuất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', null, 'vi', '1', null, null, '0', '', '', '', '0', '0');
INSERT INTO `staticpage` VALUES ('37', 'Giao Nhận Hàng Hóa ', 'giao-nhan-hang-hoa', '', '<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Cho t&ocirc;i hỏi, QTS c&oacute; giao h&agrave;ng tận nh&agrave; cho t&ocirc;i kh&ocirc;ng?</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">C&oacute; bạn nh&eacute;! QTS c&oacute; hợp t&aacute;c với c&aacute;c h&atilde;ng vận chuyển uy t&iacute;n để giao h&agrave;ng đến tận tay Kh&aacute;ch h&agrave;ng trong phạm vi to&agrave;n quốc.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Mất bao l&acirc;u kể từ khi đặt h&agrave;ng v&agrave; thanh to&aacute;n, t&ocirc;i c&oacute; thể nhận được h&agrave;ng?</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Th&ocirc;ng thường, từ 7-10 ng&agrave;y sau khi bạn ho&agrave;n th&agrave;nh việc đặt h&agrave;ng ở QTS, h&agrave;ng của bạn sẽ được chuyển về đến kho tại H&agrave; Nội. Nếu bạn ở c&aacute;c tỉnh/ th&agrave;nh kh&aacute;c ngo&agrave;i H&agrave; Nội, bạn cần chờ th&ecirc;m 1-3 ng&agrave;y để QTS gửi h&agrave;ng về tận nh&agrave; cho bạn. </span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">QTS c&oacute; thể giao h&agrave;ng cho t&ocirc;i bằng những h&igrave;nh thức n&agrave;o?</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Khi h&agrave;ng về đến kho, QTS c&oacute; thể giao h&agrave;ng cho bạn bằng c&aacute;c h&igrave;nh thức sau:</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">- Nếu bạn ở H&agrave; Nội:&nbsp; bạn c&oacute; thể đến văn ph&ograve;ng của QTS để nhận h&agrave;ng, hoặc QTS sẽ giao h&agrave;ng trực tiếp cho bạn (&aacute;p dụng cho KH ở c&aacute;c quận nội th&agrave;nh H&agrave; Nội);</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">- Nếu bạn ở tỉnh/ th&agrave;nh kh&aacute;c: QTS c&oacute; thể gửi h&agrave;ng cho bạn bằng c&aacute;c h&igrave;nh thức: Chuyển ph&aacute;t nhanh / chậm (do bạn chỉ định):</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Bạn c&oacute; thể tham khảo th&ecirc;m về c&aacute;c h&igrave;nh thức giao h&agrave;ng tại đ&acirc;y.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Cho t&ocirc;i hỏi, gi&aacute; sản phẩm đ&atilde; bao gồm ph&iacute; vận chuyển đến tận nh&agrave; chưa?</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Chưa bạn nh&eacute;! Để nhận được h&agrave;ng, bạn cần trả th&ecirc;m ph&iacute; vận chuyển t&ugrave;y theo số lượng sản phẩm bạn đặt mua. Bạn xem c&aacute;ch t&iacute;nh ph&iacute; vận chuyển ở đ&acirc;y nh&eacute;!</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">C&aacute;ch t&iacute;nh ph&iacute; vận chuyển của QTS như thế n&agrave;o?</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Ch&agrave;o bạn! Ph&iacute; vận chuyển được QTS t&iacute;nh dựa tr&ecirc;n trọng lượng của đơn h&agrave;ng bạn mua v&agrave; khoảng c&aacute;ch từ kho của người b&aacute;n đến địa chỉ nhận h&agrave;ng của bạn. Phương thức t&iacute;nh ph&iacute; vận chuyển bạn c&oacute; thể xem th&ecirc;m ở đ&acirc;y!</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">QTS c&oacute; thể hướng dẫn cho t&ocirc;i c&aacute;ch mua h&agrave;ng để được ph&iacute; vận chuyển rẻ hơn kh&ocirc;ng?</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">Khi bạn đặt h&agrave;ng, hệ thống sẽ tự t&iacute;nh ph&iacute; vận chuyển t&ugrave;y theo c&aacute;c lựa chọn của bạn. Tuy nhi&ecirc;n, bạn c&oacute; c&aacute;c c&aacute;ch sau gi&uacute;p bạn tiết kiệm được ph&iacute; vận chuyển:</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">- Đặt gộp c&aacute;c sản phẩm c&ugrave;ng một shop v&agrave;o chung một đơn h&agrave;ng;</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;\">- Đăng k&yacute; gộp chung c&aacute;c đơn h&agrave;ng để vận chuyển c&ugrave;ng một lần ở Việt Nam;</span></span></span></p>\r\n', null, 'vi', '1', null, null, '0', '', '', '', '0', '0');
INSERT INTO `staticpage` VALUES ('41', 'Các phương thức bán hàn ', 'cac-phuong-thuc-ban-han', '', '<p>Đặt h&agrave;ng tr&ecirc;n website của http://qts.com/ cực kỳ đơn giản,kh&aacute;ch h&agrave;ng c&oacute; thể thực hiện c&aacute;c bước sau:</p>\r\n\r\n<p>Bước 1: Lựa chọn sản phẩm cần mua</p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng truy cập v&agrave;o website :&nbsp; http://qts.com/ để chọn sản phẩm ưng &yacute; nhất--&gt; Kh&aacute;ch h&agrave;ng c&oacute; thể v&agrave;o từng danh mục để chọn chi tiết sản phẩm--&gt; Click chọn sản phẩm muốn mua</p>\r\n\r\n<p>Bước 2 : Th&ecirc;m v&agrave;o giỏ h&agrave;ng hoặc &quot;Đặt H&agrave;ng Ngay&quot;</p>\r\n\r\n<p>Sau khi tham khảo đầy đủ th&ocirc;ng tin về sản phẩm (chất lượng,chất liệu,gi&aacute; cả...)</p>\r\n\r\n<p>-Nếu mua từ 2 sản phẩm trở l&ecirc;n,kh&aacute;ch h&agrave;ng vui l&ograve;ng click &quot; Cho V&agrave;o Giỏ H&agrave;ng&quot; để tiếp tục chọn sản phẩm tiếp theo</p>\r\n\r\n<p>-Nếu kh&aacute;ch h&agrave;ng chỉ mua 1 sản phầm th&igrave; click lu&ocirc;n v&agrave;o n&uacute;t &quot;Đặt H&agrave;ng Ngay&quot;</p>\r\n\r\n<p>Bước 3 : Cung cấp th&ocirc;ng tin li&ecirc;n hệ (họ t&ecirc;n+ địa chỉ + số điện thoại)</p>\r\n\r\n<p>-Sau khi kh&aacute;ch h&agrave;ng click v&agrave;o n&uacute;t &quot; Đặt H&agrave;ng Ngay&quot;,m&agrave;n h&igrave;nh sẽ hiển thị ra c&aacute;c th&ocirc;ng tin về sản phẩm v&agrave; c&aacute;c th&ocirc;ng tin cần thiết</p>\r\n\r\n<p>-Kh&aacute;ch h&agrave;ng cần điền đầy đủ c&aacute;c th&ocirc;ng tin cần thiết như họ t&ecirc;n + địa chỉ + số ĐT....Sau đ&oacute; ấn v&agrave;o n&uacute;t &quot; Gửi Đơn H&agrave;ng&quot; ngay b&ecirc;n dưới cột th&ocirc;ng tin kh&aacute;ch h&agrave;ng vừa cung cấp</p>\r\n\r\n<p>Sau đ&oacute; tr&ecirc;n m&agrave;n h&igrave;nh sẽ hiển thị 1 th&ocirc;ng b&aacute;o bạn đ&atilde; đặt h&agrave;ng th&agrave;nh c&ocirc;ng</p>\r\n\r\n<p>Bước 4 : X&aacute;c nhận đơn h&agrave;ng từ bộ phận vận chuyển</p>\r\n\r\n<p>Sau khi bạn gửi đơn đơn h&agrave;ng,bộ phận chăm s&oacute;c kh&aacute;ch kh&aacute;ch h&agrave;ng của ch&uacute;ng t&ocirc;i sẽ c&oacute; email th&ocirc;ng b&aacute;o bạn đặt h&agrave;ng th&agrave;nh c&ocirc;ng,đồng thời bộ phận chuyển h&agrave;ng sẽ điện thoại x&aacute;c nhận đơn h&agrave;ng + tư vấn size + c&aacute;ch phối đồ + chương tr&igrave;nh khuyến m&atilde;i(nếu c&oacute;)</p>\r\n\r\n<p>Lưu &yacute; :Ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chuyển h&agrave;ng khi bộ phận vận chuyển chưa x&aacute;c nhận đc đơn h&agrave;ng qua ĐT,v&igrave; l&yacute; do (gọi ĐT kh&ocirc;ng nghe m&aacute;y,thu&ecirc; bao ko li&ecirc;n lạc đc...)</p>\r\n\r\n<p>Bước 5 : Nhận h&agrave;ng từ bưu t&aacute;</p>\r\n\r\n<p>Sau khi bộ phận vận chuyển x&aacute;c nhận đc đơn h&agrave;ng qua ĐT,ch&uacute;ng t&ocirc;i tiến h&agrave;nh chuyển h&agrave;ng.Kh&aacute;ch h&agrave;ng sẽ nhận đc h&agrave;ng sau 1-5ng&agrave;y t&ugrave;y thuộc khu vực...</p>\r\n\r\n<p>Trong thời gian n&agrave;y c&aacute;c bạn n&ecirc;n để &yacute; điện thoại,v&igrave; h&agrave;ng về đến nơi bưu t&aacute; sẽ gọi đt th&ocirc;ng b&aacute;o trc v&agrave; giao h&agrave;ng cho bạn.</p>\r\n\r\n<p>Lưu &yacute; : QTS chuyển h&agrave;ng đi c&aacute;c tỉnh v&agrave; khu vực ngoại th&agrave;nh chỉ giao h&agrave;ng v&agrave; thu tiền ( kh&ocirc;ng b&oacute;c h&agrave;ng ra xe v&agrave; thử h&agrave;ng trước khi thanh to&aacute;n)</p>\r\n\r\n<p>Tuy nhi&ecirc;n QTS đảm bảo kiểu d&aacute;ng v&agrave; chất liệu chuẩn y h&igrave;nh,trong trường hợp nhận h&agrave;ng kh&ocirc;ng ưng &yacute; c&oacute; thể đổi h&agrave;ng thoải m&aacute;i trong v&ograve;ng 07 ng&agrave;y</p>\r\n', null, 'vi', '1', null, null, '0', '', '', '', '0', '0');
INSERT INTO `staticpage` VALUES ('39', 'Phương Thức Vận Chuyên', 'phuong-thuc-van-chuyen', '', '<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Vận Chuyển &amp; Giao H&agrave;ng</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">1 / Kh&aacute;ch h&agrave;ng ở khu vực nội th&agrave;nh H&agrave; Nội c&oacute; 2 c&aacute;ch mua h&agrave;ng như sau</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">a/ Kh&aacute;ch h&agrave;ng c&oacute; thể qua trực tiếp xem v&agrave; mua h&agrave;ng tại cửa h&agrave;ng</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Đ/c: Số 42-L&ecirc; Quang Đạo- Nam Từ li&ecirc;m-H&agrave; Nội </span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Tel: 0985.311.215</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">b/ Giao h&agrave;ng thu tiền tận nh&agrave; ở nội th&agrave;nh H&agrave; Nội</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- Gi&aacute; ship được &aacute;p dụng cho to&agrave;n khu vực nội th&agrave;nh l&agrave; 20k/1 đơn h&agrave;ng</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- Kh&aacute;ch h&agrave;ng mua từ 2 c&aacute;i trở l&ecirc;n sẽ đc freeship khu vực nội th&agrave;nh HN</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Lưu &yacute; : Kh&aacute;ch h&agrave;ng chắc chắn lấy h&agrave;ng th&igrave; shop mới ship h&agrave;ng</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">2 / Kh&aacute;ch h&agrave;ng ở ngoại th&agrave;nh H&agrave; Nội v&agrave; c&aacute;c tỉnh kh&aacute;c c&oacute; 2 c&aacute;ch mua h&agrave;ng như sau </span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">a/ Kh&aacute;ch h&agrave;ng chuyển khoản trước sẽ được FREESHIP to&agrave;n quốc</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Segoe UI Symbol&quot;,&quot;sans-serif&quot;\">✔</span>&nbsp; Vietcombank(chi nh&aacute;nh HN) - Số TK: 0451 000 000 439 - chủ tk: Nguy&ecirc;n Thị Mai</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Segoe UI Symbol&quot;,&quot;sans-serif&quot;\">✔</span>&nbsp; Agribank(chi nh&aacute;nh Từ Li&ecirc;m-HN) - số TK : 310 020 475 852 &nbsp;- Chủ tk: Nguyễn Thị Mai </span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Segoe UI Symbol&quot;,&quot;sans-serif&quot;\">✔</span>&nbsp; Ng&acirc;n h&agrave;ng BIDV(chi nh&aacute;nh T&acirc;y Hồ-HN)- số TK: 6231 000 000 148 821 - Chủ tk: Nguyễn Thị Mai</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Trước hoặc sau khi chuyển khoản b&aacute;o cho shop: T&ecirc;n+địa chỉ+số đt+m&atilde; h&agrave;ng+số tiền đ&atilde; chuyển ---&gt; shop sẽ chuyển h&agrave;ng cho c&aacute;c bạn sau 2-3ng&agrave;y c&aacute;c bạn nhận được h&agrave;ng</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">b&gt;Thanh to&aacute;n sau: COD(Nhận h&agrave;ng thu tiền) -To&agrave;n Quốc</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- Kh&aacute;ch h&agrave;ng li&ecirc;n hệ với shop để x&aacute;c nhận m&atilde; h&agrave;ng v&agrave; số tiền cần thanh to&aacute;n khi nhận h&agrave;ng.</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- Kh&aacute;ch h&agrave;ng b&aacute;o cho shop: Họ t&ecirc;n+địa chỉ+số đt+m&atilde; h&agrave;ng</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- Shop chuyển h&agrave;ng theo địa chỉ kh&aacute;ch đ&atilde; cho. Sau 2-3 ng&agrave;y kh&aacute;ch h&agrave;ng nhận h&agrave;ng v&agrave; thanh tiền cho nh&acirc;n vi&ecirc;n bưu điện</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Lưu &yacute; : Đối với trường hợp COD, khi h&agrave;ng được chuyển giao đến qu&yacute; kh&aacute;ch, xin vui l&ograve;ng ho&agrave;n tất việc thanh to&aacute;n v&agrave; k&yacute; x&aacute;c nhận với nh&acirc;n vi&ecirc;n giao h&agrave;ng trước, sau đ&oacute; qu&yacute; kh&aacute;ch nhận h&agrave;ng v&agrave; kiểm tra sau.Nếu sản phẩm c&oacute; bất kỳ lỗi hay khiếm khuyết n&agrave;o kh&ocirc;ng đ&uacute;ng &yacute; muốn.Kh&aacute;ch h&agrave;ng c&oacute; thể li&ecirc;n hệ với Azala để đc đổi h&agrave;ng</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Tuy nhi&ecirc;n Azala đảm bảo kiểu d&aacute;ng v&agrave; chất liệu chuẩn y h&igrave;nh,trong trường hợp nhận h&agrave;ng kh&ocirc;ng ưng &yacute; c&oacute; thể đổi h&agrave;ng thoải m&aacute;i trong v&ograve;ng 07 ng&agrave;y</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">c / Cước ph&iacute; vận chuyển COD to&agrave;n quốc</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">+ Nội th&agrave;nh H&agrave; Nội:</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- Gi&aacute; ship được thu đồng gi&aacute; l&agrave; 20k/1 đơn h&agrave;ng(nhận h&agrave;ng trong ng&agrave;y)</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">+ C&aacute;c tỉnh ph&iacute;a Bắc v&agrave; ngoại th&agrave;nh H&agrave; Nội</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- Sản phẩm đ&acirc;u ti&ecirc;n được t&iacute;nh ph&iacute; l&agrave; 30K/1c,mỗi c&aacute;i tiếp theo cộng th&ecirc;m 10K</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- V&iacute; dụ : kh&aacute;ch h&agrave;ng lấy 2 c&aacute;i th&igrave; ph&iacute; vận chuyển l&agrave; : 30K+10K=40K</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">+ C&aacute;c tỉnh miền Trung + Nam</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- Sản phẩm đ&acirc;u ti&ecirc;n được t&iacute;nh ph&iacute; l&agrave; 40K/1c,mỗi c&aacute;i tiếp theo cộng th&ecirc;m 10K</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">- V&iacute; dụ : kh&aacute;ch h&agrave;ng lấy 2 c&aacute;i th&igrave; ph&iacute; vận chuyển l&agrave; : 40K+10K=50K</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Lưu &yacute; : Kh&aacute;ch h&agrave;ng mua từ 3-5 sản phẩm trở l&ecirc;n sẽ đc FREESHIP to&agrave;n quốc</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\">&nbsp;</p>\r\n', null, 'vi', '1', null, null, '0', '', '', '', '0', '0');
INSERT INTO `staticpage` VALUES ('40', 'Thời Gian Đặt Hàng ', 'thoi-gian-dat-hang', '', '<p>Đặt h&agrave;ng tr&ecirc;n website của http://qts.com/ cực kỳ đơn giản,kh&aacute;ch h&agrave;ng c&oacute; thể thực hiện c&aacute;c bước sau:</p>\r\n\r\n<p>Bước 1: Lựa chọn sản phẩm cần mua</p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng truy cập v&agrave;o website :&nbsp; http://qts.com/ để chọn sản phẩm ưng &yacute; nhất--&gt; Kh&aacute;ch h&agrave;ng c&oacute; thể v&agrave;o từng danh mục để chọn chi tiết sản phẩm--&gt; Click chọn sản phẩm muốn mua</p>\r\n\r\n<p>Bước 2 : Th&ecirc;m v&agrave;o giỏ h&agrave;ng hoặc &quot;Đặt H&agrave;ng Ngay&quot;</p>\r\n\r\n<p>Sau khi tham khảo đầy đủ th&ocirc;ng tin về sản phẩm (chất lượng,chất liệu,gi&aacute; cả...)</p>\r\n\r\n<p>-Nếu mua từ 2 sản phẩm trở l&ecirc;n,kh&aacute;ch h&agrave;ng vui l&ograve;ng click &quot; Cho V&agrave;o Giỏ H&agrave;ng&quot; để tiếp tục chọn sản phẩm tiếp theo</p>\r\n\r\n<p>-Nếu kh&aacute;ch h&agrave;ng chỉ mua 1 sản phầm th&igrave; click lu&ocirc;n v&agrave;o n&uacute;t &quot;Đặt H&agrave;ng Ngay&quot;</p>\r\n\r\n<p>Bước 3 : Cung cấp th&ocirc;ng tin li&ecirc;n hệ (họ t&ecirc;n+ địa chỉ + số điện thoại)</p>\r\n\r\n<p>-Sau khi kh&aacute;ch h&agrave;ng click v&agrave;o n&uacute;t &quot; Đặt H&agrave;ng Ngay&quot;,m&agrave;n h&igrave;nh sẽ hiển thị ra c&aacute;c th&ocirc;ng tin về sản phẩm v&agrave; c&aacute;c th&ocirc;ng tin cần thiết</p>\r\n\r\n<p>-Kh&aacute;ch h&agrave;ng cần điền đầy đủ c&aacute;c th&ocirc;ng tin cần thiết như họ t&ecirc;n + địa chỉ + số ĐT....Sau đ&oacute; ấn v&agrave;o n&uacute;t &quot; Gửi Đơn H&agrave;ng&quot; ngay b&ecirc;n dưới cột th&ocirc;ng tin kh&aacute;ch h&agrave;ng vừa cung cấp</p>\r\n\r\n<p>Sau đ&oacute; tr&ecirc;n m&agrave;n h&igrave;nh sẽ hiển thị 1 th&ocirc;ng b&aacute;o bạn đ&atilde; đặt h&agrave;ng th&agrave;nh c&ocirc;ng</p>\r\n\r\n<p>Bước 4 : X&aacute;c nhận đơn h&agrave;ng từ bộ phận vận chuyển</p>\r\n\r\n<p>Sau khi bạn gửi đơn đơn h&agrave;ng,bộ phận chăm s&oacute;c kh&aacute;ch kh&aacute;ch h&agrave;ng của ch&uacute;ng t&ocirc;i sẽ c&oacute; email th&ocirc;ng b&aacute;o bạn đặt h&agrave;ng th&agrave;nh c&ocirc;ng,đồng thời bộ phận chuyển h&agrave;ng sẽ điện thoại x&aacute;c nhận đơn h&agrave;ng + tư vấn size + c&aacute;ch phối đồ + chương tr&igrave;nh khuyến m&atilde;i(nếu c&oacute;)</p>\r\n\r\n<p>Lưu &yacute; :Ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chuyển h&agrave;ng khi bộ phận vận chuyển chưa x&aacute;c nhận đc đơn h&agrave;ng qua ĐT,v&igrave; l&yacute; do (gọi ĐT kh&ocirc;ng nghe m&aacute;y,thu&ecirc; bao ko li&ecirc;n lạc đc...)</p>\r\n\r\n<p>Bước 5 : Nhận h&agrave;ng từ bưu t&aacute;</p>\r\n\r\n<p>Sau khi bộ phận vận chuyển x&aacute;c nhận đc đơn h&agrave;ng qua ĐT,ch&uacute;ng t&ocirc;i tiến h&agrave;nh chuyển h&agrave;ng.Kh&aacute;ch h&agrave;ng sẽ nhận đc h&agrave;ng sau 1-5ng&agrave;y t&ugrave;y thuộc khu vực...</p>\r\n\r\n<p>Trong thời gian n&agrave;y c&aacute;c bạn n&ecirc;n để &yacute; điện thoại,v&igrave; h&agrave;ng về đến nơi bưu t&aacute; sẽ gọi đt th&ocirc;ng b&aacute;o trc v&agrave; giao h&agrave;ng cho bạn.</p>\r\n\r\n<p>Lưu &yacute; : QTS chuyển h&agrave;ng đi c&aacute;c tỉnh v&agrave; khu vực ngoại th&agrave;nh chỉ giao h&agrave;ng v&agrave; thu tiền ( kh&ocirc;ng b&oacute;c h&agrave;ng ra xe v&agrave; thử h&agrave;ng trước khi thanh to&aacute;n)</p>\r\n\r\n<p>Tuy nhi&ecirc;n QTS đảm bảo kiểu d&aacute;ng v&agrave; chất liệu chuẩn y h&igrave;nh,trong trường hợp nhận h&agrave;ng kh&ocirc;ng ưng &yacute; c&oacute; thể đổi h&agrave;ng thoải m&aacute;i trong v&ograve;ng 07 ng&agrave;y</p>\r\n', null, 'vi', '1', null, null, '0', '', '', '', '0', '0');
INSERT INTO `staticpage` VALUES ('42', 'Tư vấn miễn phí 24/7', 'tu-van-mien-phi-24-7', '<p>C&ocirc;ng ty cổ phần c&ocirc;ng nghệ QTS Việt Nam ( QTS). Được x&acirc;y dựng n&ecirc;n từ một tập thể những c&aacute;n bộ quản l&yacute; chuy&ecirc;n nghiệp được đ&agrave;o tạo vững chắc trong c&ocirc;ng t&aacute;c quản trị kinh doanh v&agrave; c&ocirc;ng nghệ cao.</p>\r\n', '<p>C&aacute;n bộ kỹ thuật: c&oacute; tay nghề cao được đ&agrave;o tạo từ c&aacute;c trường danh tiếng v&agrave; c&oacute; thể l&agrave;m chủ được c&ocirc;ng nghệ ti&ecirc;n tiến nhất, lu&ocirc;n lu&ocirc;n đ&oacute;n đầu c&ocirc;ng nghệ trong lĩnh vực c&ocirc;ng nghệ th&ocirc;ng tin &aacute;p dụng hiệu quả c&aacute;c sản phẩm v&agrave;o thực tế.</p>\r\n\r\n<p>C&aacute;n bộ kinh doanh: năng động, hiệu quả trong c&ocirc;ng t&aacute;c t&igrave;m kiếm kh&aacute;ch h&agrave;ng mới v&agrave; với phương ch&acirc;m &ldquo;H&atilde;y để ch&uacute;ng t&ocirc;i l&agrave;m h&agrave;i l&ograve;ng qu&yacute; kh&aacute;ch &rdquo; đội ngũ c&aacute;n bộ kinh doanh đ&atilde; tư vấn v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng với dịch vụ c&ocirc;ng nghệ th&ocirc;ng tin tốt nhất</p>\r\n\r\n<p>Đội ngũ chuy&ecirc;n gia quản lỹ, nghi&ecirc;n cứu v&agrave; ph&aacute;t triển thị trường, Cập nhật thường xuy&ecirc;n c&aacute;c th&ocirc;ng tin văn bản quy phạm ph&aacute;p luật của nh&agrave; nước trong c&ocirc;ng t&aacute;c quản l&yacute; nh&agrave; nước đảm bảo tu&acirc;n thủ chặt chẽ c&aacute;c quy định của Ch&iacute;nh phủ, Bộ chủ quản v&agrave; ph&ugrave; hợp với c&ocirc;ng t&aacute;c quản l&yacute; tại c&aacute;c địa phương</p>\r\n\r\n<p><strong>Phương ch&acirc;m &ndash; Sứ mệnh</strong></p>\r\n\r\n<p><strong><em>Phương ch&acirc;m:</em></strong>Với phương ch&acirc;m &ldquo; H&atilde;y để ch&uacute;ng t&ocirc;i l&agrave;m h&agrave;i l&ograve;ng qu&yacute; kh&aacute;ch&rdquo; C&ocirc;ng ty cổ phần c&ocirc;ng nghệ QTS Việt Nam lu&ocirc;n lu&ocirc;n đưa ra c&aacute;c giải ph&aacute;p mới nhất, tư vấn v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng với dịch vụ tốt nhất.</p>\r\n\r\n<p><strong><em>Sứ mệnh:</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L&agrave; c&ocirc;ng ty Tư vấn v&agrave; Cung cấp giải ph&aacute;p phần mềm số một tại việt nam.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Được kh&aacute;ch h&agrave;ng đ&aacute;nh gi&aacute; sản phẩm hiệu quả v&agrave; chi ph&iacute; tối ưu.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&ocirc;ng ty c&oacute; văn h&oacute;a hiện đại</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&aacute;n bộ c&oacute; thu nhập gấp đ&ocirc;i mặt bằng chung của thị trường cho th&agrave;nh vi&ecirc;n của m&igrave;nh&nbsp;</p>\r\n', null, 'vi', null, null, null, '0', '', '', '', '0', '0');

-- ----------------------------
-- Table structure for stocks
-- ----------------------------
DROP TABLE IF EXISTS `stocks`;
CREATE TABLE `stocks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(120) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `total_value` bigint(20) DEFAULT '0' COMMENT 'số lượng thực tế',
  `total_quantity` int(11) DEFAULT '0' COMMENT 'số lượng trên danh sách',
  `price_up` int(11) DEFAULT '0' COMMENT 'tổng tiền chênh lệch tăng',
  `price_down` int(11) DEFAULT '0' COMMENT 'Tổng tiền chênh lệch giảm',
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `user_create` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of stocks
-- ----------------------------

-- ----------------------------
-- Table structure for stocks_detail
-- ----------------------------
DROP TABLE IF EXISTS `stocks_detail`;
CREATE TABLE `stocks_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) DEFAULT NULL COMMENT 'Mã Sản Phẩm',
  `stock_id` int(11) DEFAULT NULL COMMENT 'Mã Bảng Kiểm Kho',
  `quantity` int(11) DEFAULT NULL COMMENT 'Số lượng sản phẩm ',
  `quantity_store` int(11) DEFAULT NULL COMMENT 'số lượng sản phẩm thực tế',
  `quantity_difference` int(11) DEFAULT NULL COMMENT 'số lượng sp chênh lệch',
  `price_sale` int(11) DEFAULT NULL COMMENT 'giá bán ra của sản phẩm',
  `price_import` int(11) DEFAULT NULL COMMENT 'giá nhập của sản phẩm',
  `time` int(11) DEFAULT NULL COMMENT 'thời gian tạo',
  `active` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='Bảng Báo Cáo Kiểm Kho';

-- ----------------------------
-- Records of stocks_detail
-- ----------------------------

-- ----------------------------
-- Table structure for street
-- ----------------------------
DROP TABLE IF EXISTS `street`;
CREATE TABLE `street` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `pre` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `districtid` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of street
-- ----------------------------

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `fax` char(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `place` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `province` int(11) unsigned DEFAULT NULL,
  `district` int(11) unsigned DEFAULT NULL,
  `ward` int(10) unsigned DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tax_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `note` text CHARACTER SET utf8,
  `user_id` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `date` char(30) COLLATE utf8_bin DEFAULT NULL,
  `time` char(20) COLLATE utf8_bin DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `wallet` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('21', 'Công ty A.D.C', 'NCC21', '0986839102', '', '', '', null, null, null, null, '', '', '', null, null, null, '1521185291', '1521133200', null);
INSERT INTO `supplier` VALUES ('22', 'CÔNG TY CỔ PHẦN QTS', 'NCC22', '0956546564', '', '', '', null, null, null, null, '', '', '', null, null, null, '1521185730', '1521133200', null);
INSERT INTO `supplier` VALUES ('23', 'VN SOLUTION', 'NCC23', '0976586575', '', '', '', null, null, null, null, '', '', '', null, null, null, '1521187604', '1521133200', null);
INSERT INTO `supplier` VALUES ('24', 'CÔNG TY CỔ PHẦN QTS', 'NCC24', '0965 647 543', '', '', '', null, null, null, null, '', '', '', null, null, null, '1523519688', '1523466000', null);
INSERT INTO `supplier` VALUES ('25', 'GOOGLE COMPANY', 'NCC25', '0865544579', '', '', '', null, null, null, null, '', '', '', null, null, null, '1523519718', '1523466000', null);

-- ----------------------------
-- Table structure for supplier_debt
-- ----------------------------
DROP TABLE IF EXISTS `supplier_debt`;
CREATE TABLE `supplier_debt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) DEFAULT NULL,
  `id_create` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `nkd` float(22,0) DEFAULT NULL,
  `ghino` float(22,0) DEFAULT NULL,
  `ghico` float(22,0) DEFAULT NULL,
  `nkc` float(22,0) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `time_insert` int(11) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of supplier_debt
-- ----------------------------

-- ----------------------------
-- Table structure for support_online
-- ----------------------------
DROP TABLE IF EXISTS `support_online`;
CREATE TABLE `support_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yahoo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `skype` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `image` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of support_online
-- ----------------------------
INSERT INTO `support_online` VALUES ('19', 'https://id.zalo.me/account/login?continue=https%3A', '0936236786', 'skype_trantrung', 'trunag123@gmail.com', 'Mr Trung', '1', null, '2', 'abc');
INSERT INTO `support_online` VALUES ('20', 'yahoo_tranmanh', '0977160509', 'https://www.facebook.com/', 'tranmanh@gmail.com', 'đặng trần mạnh', '1', null, '0', '');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tags
-- ----------------------------

-- ----------------------------
-- Table structure for tags_news
-- ----------------------------
DROP TABLE IF EXISTS `tags_news`;
CREATE TABLE `tags_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tags_news
-- ----------------------------

-- ----------------------------
-- Table structure for tags_to_news
-- ----------------------------
DROP TABLE IF EXISTS `tags_to_news`;
CREATE TABLE `tags_to_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_raovat` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of tags_to_news
-- ----------------------------

-- ----------------------------
-- Table structure for tags_to_product
-- ----------------------------
DROP TABLE IF EXISTS `tags_to_product`;
CREATE TABLE `tags_to_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tags` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of tags_to_product
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_xnt
-- ----------------------------
DROP TABLE IF EXISTS `tbl_xnt`;
CREATE TABLE `tbl_xnt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `mahh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sltd` int(11) DEFAULT NULL COMMENT 'Số lượng tồn đầu ngày',
  `sln` int(11) DEFAULT NULL COMMENT 'Số lượng hàng nhập trong ngày',
  `slx` int(11) DEFAULT NULL COMMENT 'Số lượng hàng xuất trong ngày',
  `sltc` int(11) DEFAULT NULL COMMENT 'Số lượng hàng tồn cuối ngày',
  `sltt` int(11) DEFAULT NULL COMMENT 'Số lượng hàng tồn tối thiểu',
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL COMMENT 'Giá Hiện Tại',
  `price_export` int(11) DEFAULT NULL COMMENT 'Giá Xuất Hàng',
  `price_import` int(11) DEFAULT NULL COMMENT 'Giá Nhập Hàng',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=234 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tbl_xnt
-- ----------------------------
INSERT INTO `tbl_xnt` VALUES ('230', '1523552400', '1523603853', 'HH186', '33', '0', '2', '31', '1', '186', '450000', null, null);
INSERT INTO `tbl_xnt` VALUES ('231', '1523552400', '1523603975', 'HH185', '15', '0', '5', '10', '1', '185', '400000', null, null);
INSERT INTO `tbl_xnt` VALUES ('232', '1523552400', '1523606629', 'HH185', '10', '0', '1', '9', '1', '185', '400000', null, null);
INSERT INTO `tbl_xnt` VALUES ('233', '1523552400', '1523607051', 'HH185', '9', '0', '1', '8', '1', '185', '400000', null, null);

-- ----------------------------
-- Table structure for thong_ke_online
-- ----------------------------
DROP TABLE IF EXISTS `thong_ke_online`;
CREATE TABLE `thong_ke_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_date` int(11) NOT NULL,
  `today` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of thong_ke_online
-- ----------------------------
INSERT INTO `thong_ke_online` VALUES ('37', '1517850000', '0');
INSERT INTO `thong_ke_online` VALUES ('38', '1517936400', '1');
INSERT INTO `thong_ke_online` VALUES ('39', '1518022800', '29');
INSERT INTO `thong_ke_online` VALUES ('40', '1518109200', '20');
INSERT INTO `thong_ke_online` VALUES ('41', '1519578000', '9');
INSERT INTO `thong_ke_online` VALUES ('42', '1519664400', '15');
INSERT INTO `thong_ke_online` VALUES ('43', '1519750800', '5');
INSERT INTO `thong_ke_online` VALUES ('44', '1521046800', '55');
INSERT INTO `thong_ke_online` VALUES ('45', '1521133200', '9');
INSERT INTO `thong_ke_online` VALUES ('46', '1521219600', '233');
INSERT INTO `thong_ke_online` VALUES ('47', '1522256400', '765');
INSERT INTO `thong_ke_online` VALUES ('48', '1522342800', '2933');
INSERT INTO `thong_ke_online` VALUES ('49', '1522429200', '777');
INSERT INTO `thong_ke_online` VALUES ('50', '1522774800', '561');
INSERT INTO `thong_ke_online` VALUES ('51', '1522861200', '13');
INSERT INTO `thong_ke_online` VALUES ('52', '1523034000', '378');
INSERT INTO `thong_ke_online` VALUES ('53', '1523206800', '168');
INSERT INTO `thong_ke_online` VALUES ('54', '1523293200', '41');
INSERT INTO `thong_ke_online` VALUES ('55', '1523379600', '6');
INSERT INTO `thong_ke_online` VALUES ('56', '1523466000', '147');
INSERT INTO `thong_ke_online` VALUES ('57', '1523552400', '554');
INSERT INTO `thong_ke_online` VALUES ('58', '1523638800', '17');
INSERT INTO `thong_ke_online` VALUES ('59', '1523984400', '80');
INSERT INTO `thong_ke_online` VALUES ('60', '1525107600', '96');
INSERT INTO `thong_ke_online` VALUES ('61', '1525194000', '10');
INSERT INTO `thong_ke_online` VALUES ('62', '1525539600', '53');
INSERT INTO `thong_ke_online` VALUES ('63', '1526144400', '0');
INSERT INTO `thong_ke_online` VALUES ('64', '1526662800', '186');
INSERT INTO `thong_ke_online` VALUES ('65', '1527267600', '61');
INSERT INTO `thong_ke_online` VALUES ('66', '1527354000', '0');
INSERT INTO `thong_ke_online` VALUES ('67', '1527613200', '1');
INSERT INTO `thong_ke_online` VALUES ('68', '1527699600', '22');
INSERT INTO `thong_ke_online` VALUES ('69', '1527786000', '125');
INSERT INTO `thong_ke_online` VALUES ('70', '1527872400', '1');
INSERT INTO `thong_ke_online` VALUES ('71', '1527958800', '0');
INSERT INTO `thong_ke_online` VALUES ('72', '1528045200', '1');
INSERT INTO `thong_ke_online` VALUES ('73', '1528131600', '8');
INSERT INTO `thong_ke_online` VALUES ('74', '1528304400', '0');
INSERT INTO `thong_ke_online` VALUES ('75', '1528390800', '11');
INSERT INTO `thong_ke_online` VALUES ('76', '1528477200', '67');
INSERT INTO `thong_ke_online` VALUES ('77', '1528563600', '36');
INSERT INTO `thong_ke_online` VALUES ('78', '1528736400', '3');

-- ----------------------------
-- Table structure for uet_content
-- ----------------------------
DROP TABLE IF EXISTS `uet_content`;
CREATE TABLE `uet_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_webste` int(11) DEFAULT NULL,
  `location` int(1) DEFAULT NULL COMMENT '1. o tren, 2. o duoi',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_content
-- ----------------------------
INSERT INTO `uet_content` VALUES ('3', 'Content', 'Content tổng', '1', '1', '1');

-- ----------------------------
-- Table structure for uet_content_detail
-- ----------------------------
DROP TABLE IF EXISTS `uet_content_detail`;
CREATE TABLE `uet_content_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `div_full_start` text,
  `div_full_end` text,
  `div_left_start` text,
  `div_left_end` text,
  `div_right_start` text,
  `div_right_end` text,
  `type` int(11) DEFAULT NULL COMMENT '1. web full, 2. web left - mid, 3. web left - mid - right, 4. web mid - right',
  `id_content` int(11) DEFAULT NULL,
  `url` text,
  `div_mid_start` text,
  `div_mid_end` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uet_content_detail
-- ----------------------------
INSERT INTO `uet_content_detail` VALUES ('5', 'Left (col-3) - Mid (col-9)', null, null, '<div class=\"col-md-3 col-sm-4 hidden-xs\"><div class=\"row_10\">', '</div></div>', null, null, '2', '3', 'content_1.png', '<div class=\"col-md-9 col-sm-8 hidden-xs\"><div class=\"row_10\">', '</div></div>');
INSERT INTO `uet_content_detail` VALUES ('6', 'Left (col-280) - Mid (col-960)', null, null, '<div class=\"col-280 col-sm-4 hidden-xs\"><div class=\"row_10\">', '</div></div>', null, null, '2', '3', 'content_6.png', '<div class=\"col-960 col-sm-4 hidden-xs\"><div class=\"row_10\">', '</div></div>');
INSERT INTO `uet_content_detail` VALUES ('7', 'Full - width (Col-12)', '<div class=\"col-md-12\"><div class=\"row\">', '</div></div>', null, null, null, null, '1', '3', 'content_5.png', null, null);
INSERT INTO `uet_content_detail` VALUES ('8', 'Left (Col-280) - Mid (Col-640) - Right (Col-280)', null, null, '<div class=\"col-280 col-sm-3 hidden-xs\"><div class=\"row_10\">', '</div></div>', '<div class=\"col-280 hidden-sm hidden-xs\"><div class=\"row_10\">', '</div></div>', '3', '3', 'content_4.png', '<div class=\"col-640 col-sm-9\"><div class=\"row_10\">', '</div></div>');
INSERT INTO `uet_content_detail` VALUES ('9', 'Left (Col-3) - Mid (Col-6) - Right (Col-3)', null, null, '<div class=\"col-md-3 col-sm-3 hidden-xs\"><div class=\"row_10\">', '</div></div>', '<div class=\"col-md-3 hidden-sm hidden-xs\"><div class=\"row_10\">', '</div></div>', '3', '3', 'content_3.png', '<div class=\"col-md-9 col-sm-9\"><div class=\"row_10\">', '</div></div>');
INSERT INTO `uet_content_detail` VALUES ('10', 'Mid (Col-9) - Right (Col-3)', null, null, null, null, '<div class=\"col-md-3 col-sm-4 hidden-xs\"><div class=\"row_10\">', '</div></div>', '4', '3', 'content_2.png', '<div class=\"col-md-9 col-sm-8\"><div class=\"row_10\">', '</div></div>');
INSERT INTO `uet_content_detail` VALUES ('11', 'Mid (Col-960) - Right (Col-280)', null, null, null, null, '<div class=\"col-280 col-sm-4 hidden-xs\"><div class=\"row_10\">', '</div></div>', '4', '3', 'content_7.png', '<div class=\"col-960 col-sm-8\"><div class=\"row_10\">', '</div></div>');

-- ----------------------------
-- Table structure for uet_content_left
-- ----------------------------
DROP TABLE IF EXISTS `uet_content_left`;
CREATE TABLE `uet_content_left` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_content` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_content_left
-- ----------------------------
INSERT INTO `uet_content_left` VALUES ('7', 'LEFT', 'Thư viện Left giống Right', '1', '3');

-- ----------------------------
-- Table structure for uet_content_left_module
-- ----------------------------
DROP TABLE IF EXISTS `uet_content_left_module`;
CREATE TABLE `uet_content_left_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `link_module` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uet_content_left_module
-- ----------------------------
INSERT INTO `uet_content_left_module` VALUES ('1', 'Danh Mục Sản Phẩm', 'website/Uet_content_leftright/Danhmuc_sanpham/', '', '7', 'uet_left_cateproduct');
INSERT INTO `uet_content_left_module` VALUES ('2', 'Danh Mục Tin Tức', 'website/Uet_content_leftright/Danhmuc_tintuc/', '', '7', 'uet_left_catenews');
INSERT INTO `uet_content_left_module` VALUES ('3', 'Danh Mục Hình Ảnh', 'website/Uet_content_leftright/Danhmuc_hinhanh/', '', '7', 'uet_left_media');
INSERT INTO `uet_content_left_module` VALUES ('4', 'Banner Quảng Cáo', 'website/Uet_content_leftright/Banner_quangcao/', '', '7', 'uet_left_advertise');
INSERT INTO `uet_content_left_module` VALUES ('5', 'Sản Phẩm Nổi Bật', 'website/Uet_content_leftright/SanPhamNoiBat/', '', '7', 'uet_left_hotproduct');
INSERT INTO `uet_content_left_module` VALUES ('6', 'Tin Tức Nổi Bật', 'website/Uet_content_leftright/TinTucNoiBat/', '', '7', 'uet_left_hotnews');
INSERT INTO `uet_content_left_module` VALUES ('7', 'Hỗ Trợ Khách Hàng', 'website/Uet_content_leftright/HoTroKhachHang/', '', '7', 'uet_left_support');
INSERT INTO `uet_content_left_module` VALUES ('8', 'Thống Kê Truy Cập', 'website/Uet_content_leftright/ThongKeTruyCap/', '', '7', 'uet_left_counter');

-- ----------------------------
-- Table structure for uet_content_mid
-- ----------------------------
DROP TABLE IF EXISTS `uet_content_mid`;
CREATE TABLE `uet_content_mid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_content` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_content_mid
-- ----------------------------
INSERT INTO `uet_content_mid` VALUES ('5', 'MID', 'Phần trung tâm của website', '1', '3');

-- ----------------------------
-- Table structure for uet_content_mid_module
-- ----------------------------
DROP TABLE IF EXISTS `uet_content_mid_module`;
CREATE TABLE `uet_content_mid_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `link_module` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_mid` int(11) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uet_content_mid_module
-- ----------------------------
INSERT INTO `uet_content_mid_module` VALUES ('1', 'Sản Phẩm Theo Danh Mục', 'website/Uet_content_mid/Product_category/', '', '5', 'uet_mid_productcate');
INSERT INTO `uet_content_mid_module` VALUES ('2', 'Tin Tức Theo Danh Mục', 'website/Uet_content_mid/News_category/', '', '5', 'uet_mid_newscate');
INSERT INTO `uet_content_mid_module` VALUES ('3', 'Sản Phẩm Nổi Bật', 'website/Uet_content_mid/Product_hot/', '', '5', 'uet_mid_producthot');
INSERT INTO `uet_content_mid_module` VALUES ('4', 'Tin Tức Nổi Bật', 'website/Uet_content_mid/News_hot/', '', '5', 'uet_mid_newshot');
INSERT INTO `uet_content_mid_module` VALUES ('5', 'Thư Viện Giới Thiệu', 'website/Uet_content_mid/Library_gioithieu/', '', '5', 'uet_mid_introduce');
INSERT INTO `uet_content_mid_module` VALUES ('6', 'Thư Viện Đối Tác', 'website/Uet_content_mid/Library_doitac/', '', '5', 'uet_mid_partner');
INSERT INTO `uet_content_mid_module` VALUES ('7', 'Ý Kiến Khách Hàng', 'website/Uet_content_mid/Ykien_khachhang/', '', '5', 'uet_mid_customer');

-- ----------------------------
-- Table structure for uet_createwebsite
-- ----------------------------
DROP TABLE IF EXISTS `uet_createwebsite`;
CREATE TABLE `uet_createwebsite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website` int(11) DEFAULT NULL,
  `header` int(11) NOT NULL,
  `footer` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `create` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `process` int(11) DEFAULT NULL COMMENT '1. đang trong quá trình sinh web, 2. đã xuất web',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uet_createwebsite
-- ----------------------------

-- ----------------------------
-- Table structure for uet_createwebsite_content
-- ----------------------------
DROP TABLE IF EXISTS `uet_createwebsite_content`;
CREATE TABLE `uet_createwebsite_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_content_detail` int(11) DEFAULT NULL,
  `id_website` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uet_createwebsite_content
-- ----------------------------

-- ----------------------------
-- Table structure for uet_createwebsite_content_module_detail
-- ----------------------------
DROP TABLE IF EXISTS `uet_createwebsite_content_module_detail`;
CREATE TABLE `uet_createwebsite_content_module_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_module` int(11) DEFAULT NULL,
  `id_library` int(11) DEFAULT NULL,
  `id_content_child` int(11) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uet_createwebsite_content_module_detail
-- ----------------------------

-- ----------------------------
-- Table structure for uet_footer
-- ----------------------------
DROP TABLE IF EXISTS `uet_footer`;
CREATE TABLE `uet_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_website` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_footer
-- ----------------------------
INSERT INTO `uet_footer` VALUES ('1', '1', '1', 'library/footer/1/', '1', '1', '1', null);

-- ----------------------------
-- Table structure for uet_header
-- ----------------------------
DROP TABLE IF EXISTS `uet_header`;
CREATE TABLE `uet_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_website` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_header
-- ----------------------------
INSERT INTO `uet_header` VALUES ('19', '', '', 'library/header/1/', '1', '1', '1', null);
INSERT INTO `uet_header` VALUES ('20', 'header 1', '1', 'library/header/2/', '2', '1', '1', null);

-- ----------------------------
-- Table structure for uet_left_advertise
-- ----------------------------
DROP TABLE IF EXISTS `uet_left_advertise`;
CREATE TABLE `uet_left_advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_left_advertise
-- ----------------------------

-- ----------------------------
-- Table structure for uet_left_catenews
-- ----------------------------
DROP TABLE IF EXISTS `uet_left_catenews`;
CREATE TABLE `uet_left_catenews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_left_catenews
-- ----------------------------

-- ----------------------------
-- Table structure for uet_left_cateproduct
-- ----------------------------
DROP TABLE IF EXISTS `uet_left_cateproduct`;
CREATE TABLE `uet_left_cateproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_left_cateproduct
-- ----------------------------
INSERT INTO `uet_left_cateproduct` VALUES ('2', '1111', '1111', '1', '1', 'library/content/left/danhmuc_sanpham/1/', '1', null);
INSERT INTO `uet_left_cateproduct` VALUES ('3', '1111', '1111', '1', '1', 'library/content/left/danhmuc_sanpham/1/', '4', null);
INSERT INTO `uet_left_cateproduct` VALUES ('4', '1111', '1111', '1', '1', 'library/content/left/danhmuc_sanpham/1/', '5', null);
INSERT INTO `uet_left_cateproduct` VALUES ('5', '1111', '1111', '1', '1', 'library/content/left/danhmuc_sanpham/1/', '6', null);

-- ----------------------------
-- Table structure for uet_left_counter
-- ----------------------------
DROP TABLE IF EXISTS `uet_left_counter`;
CREATE TABLE `uet_left_counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_left_counter
-- ----------------------------

-- ----------------------------
-- Table structure for uet_left_hotnews
-- ----------------------------
DROP TABLE IF EXISTS `uet_left_hotnews`;
CREATE TABLE `uet_left_hotnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_left_hotnews
-- ----------------------------

-- ----------------------------
-- Table structure for uet_left_hotproduct
-- ----------------------------
DROP TABLE IF EXISTS `uet_left_hotproduct`;
CREATE TABLE `uet_left_hotproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_left_hotproduct
-- ----------------------------

-- ----------------------------
-- Table structure for uet_left_media
-- ----------------------------
DROP TABLE IF EXISTS `uet_left_media`;
CREATE TABLE `uet_left_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_left_media
-- ----------------------------

-- ----------------------------
-- Table structure for uet_left_support
-- ----------------------------
DROP TABLE IF EXISTS `uet_left_support`;
CREATE TABLE `uet_left_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_left` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_left_support
-- ----------------------------
INSERT INTO `uet_left_support` VALUES ('1', 'Website phổ thông', '1', '1', '1', 'library/content/left/hotro_khachhang/1/', '1', null);

-- ----------------------------
-- Table structure for uet_mid_customer
-- ----------------------------
DROP TABLE IF EXISTS `uet_mid_customer`;
CREATE TABLE `uet_mid_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_mid` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_mid_customer
-- ----------------------------

-- ----------------------------
-- Table structure for uet_mid_introduce
-- ----------------------------
DROP TABLE IF EXISTS `uet_mid_introduce`;
CREATE TABLE `uet_mid_introduce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_mid` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_mid_introduce
-- ----------------------------

-- ----------------------------
-- Table structure for uet_mid_newscate
-- ----------------------------
DROP TABLE IF EXISTS `uet_mid_newscate`;
CREATE TABLE `uet_mid_newscate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_mid` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_mid_newscate
-- ----------------------------

-- ----------------------------
-- Table structure for uet_mid_newshot
-- ----------------------------
DROP TABLE IF EXISTS `uet_mid_newshot`;
CREATE TABLE `uet_mid_newshot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_mid` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_mid_newshot
-- ----------------------------

-- ----------------------------
-- Table structure for uet_mid_partner
-- ----------------------------
DROP TABLE IF EXISTS `uet_mid_partner`;
CREATE TABLE `uet_mid_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_mid` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_mid_partner
-- ----------------------------

-- ----------------------------
-- Table structure for uet_mid_productcate
-- ----------------------------
DROP TABLE IF EXISTS `uet_mid_productcate`;
CREATE TABLE `uet_mid_productcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_mid` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_mid_productcate
-- ----------------------------
INSERT INTO `uet_mid_productcate` VALUES ('1', 'aaa', '1111', '1', '1', 'library/content/mid/product_category/1/', '1', null);
INSERT INTO `uet_mid_productcate` VALUES ('2', 'aaa', '1111', '1', '1', 'library/content/mid/product_category/1/', '2', null);
INSERT INTO `uet_mid_productcate` VALUES ('3', 'aaa', '1111', '1', '1', 'library/content/mid/product_category/1/', '3', null);
INSERT INTO `uet_mid_productcate` VALUES ('4', 'aaa', '1111', '1', '1', 'library/content/mid/product_category/1/', '4', null);

-- ----------------------------
-- Table structure for uet_mid_producthot
-- ----------------------------
DROP TABLE IF EXISTS `uet_mid_producthot`;
CREATE TABLE `uet_mid_producthot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_mid` int(11) DEFAULT NULL,
  `widgets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_mid_producthot
-- ----------------------------
INSERT INTO `uet_mid_producthot` VALUES ('1', null, null, null, '1', 'library/header/2/', null, null);

-- ----------------------------
-- Table structure for uet_website
-- ----------------------------
DROP TABLE IF EXISTS `uet_website`;
CREATE TABLE `uet_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `infor` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uet_website
-- ----------------------------
INSERT INTO `uet_website` VALUES ('1', 'Website phổ thông', 'basic_website', 'Website giới thiệu sản phẩm\nWebsite giới thiệu công ty\nWebsite tin tức \nWebsite bán hàng', '1');
INSERT INTO `uet_website` VALUES ('2', 'website thương mại điện tử', 'advance_website', 'Website bán hàng cao cấp. Giống một siêu thị thu nhỏ', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `md5_id` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(35) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(35) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `use_salt` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `shop_name` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `avt_dir` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `use_logo` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `block` tinyint(3) unsigned DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` int(1) unsigned DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `address_province` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `address_district` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `address_ward` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `use_mobile` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `use_face` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `use_yahoo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `use_skype` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `use_group` int(3) unsigned DEFAULT NULL,
  `active` int(1) unsigned DEFAULT NULL,
  `use_key` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `smskey` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `token` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `deleted` tinyint(3) unsigned DEFAULT NULL,
  `use_regisdate` int(11) unsigned DEFAULT NULL,
  `use_enddate` int(11) unsigned DEFAULT NULL,
  `lastest_login` int(11) unsigned DEFAULT NULL,
  `signup_date` int(11) DEFAULT NULL,
  `lever` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=645 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', null, 'admin', 'admin', 'daibkz@gmail.com', '2663ecf1863ca7cdcecd30968c383f01', 'Admin', 'Wm8KT06E', null, null, null, null, null, '0000-00-00', '1', 'Ninh Binh', '66', null, null, '0986839102', null, 'dainguyen', '', '4', '1', '9671508f22c9982fbac60ffc130f9b7811ec2b4d7f6e9f253679a3b950a3f5c8', null, null, null, '1498496400', '1814029200', '1523695884', null, '2');
INSERT INTO `users` VALUES ('617', '5d44ee6f2c3f71b73125876103c8f6c4', 'taikhoan', '01649962597', 'cauhai.1297@gmail.com', 'ab77a83b110f3517f746938bf49d0ae3', 'Nguyễn Văn Hải', null, null, '04072017', '986bc2226881542276ecf99e72443fc7.jpg', null, '0', null, null, 'Số 38 - Đường Dương Khuê ', '01', '005', '00163', null, null, null, null, null, '1', null, '595ae9294eb32', '2d9228de1d6c18ad3ab56b2a0c6d2def', '0', '1499130153', null, '1500969769', null, '0');
INSERT INTO `users` VALUES ('620', 'b73dfe25b4b8714c029b37a6ad3006fa', 'taikhoan', '0986126561', 'hungvu258@gmail.com', 'a9f1ea798b9bcdcf0573dad7af97cbe0', 'Vũ Văn Hùng', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, '1', null, '595f3520d9e2e', '86054560b15b889346283a906596eaa6', '0', '1499411744', null, '1499411806', null, '0');
INSERT INTO `users` VALUES ('612', 'f76a89f0cb91bc419542ce9fa43902dc', 'ĐẶNG VĂN ĐIỀN', '0965986385', 'cauvan1995@gmail.com', 'c26be8aaf53b15054896983b43eb6a65', 'ĐẶNG VĂN ĐIỀN', '-h01K8w3', null, '03072017', 'ad29f13d8e28e7cabeaf257192385ba6.png', null, '0', null, '1', 'Số 36 Dương Khuê', '01', '005', '00163', null, null, null, null, '4', '1', 'c51519f1ba3de1da58ef5bd2850861e5bf233a4b55eec27fdef32357a98b7205', '5954b39739ebb', '36fb0bab89277945551398212d0c1d8e', '0', '1499619600', '2067613200', '1504604112', '2017', '1');
INSERT INTO `users` VALUES ('619', 'cdc0d6e63aa8e41c89689f54970bb35f', 'taikhoan', '0985088848', 'ngoc.dbsk@gmail.com', 'acb4798109c61257851f53f7521d8a4f', 'Đỗ Thị Ngọc', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, '1', null, '595c4381c1481', 'cd3c498d71a8889eebe96ed5946df7a3', '0', '1499218817', null, '1499503366', null, '0');
INSERT INTO `users` VALUES ('616', '7750ca3559e5b8e1f44210283368fc16', 'taikhoan', '0915460000', 'ktviet.com.vn@gmail.com', '6140c8871dd9df0c091760c83d3562a7', 'Kỹ thuật việt', null, null, null, null, null, '0', null, null, 'Số 38 Đường Dương Khuê ', '01', '005', '00163', null, null, null, null, null, '1', null, '595a22e73caf4', 'd04eedd402adbee246d22bd05a16d82f', '0', '1499079399', null, '1501031009', null, '0');
INSERT INTO `users` VALUES ('621', '85fc37b18c57097425b52fc7afbb6969', 'taikhoan', '0987999947', 'ktviet.com.vn@gmail.com', '6140c8871dd9df0c091760c83d3562a7', 'aalo.vn', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, '0', null, '5960999273327', '9652a76f8510d397d571651a98234986', '0', '1499502994', null, '1500945384', null, '0');
INSERT INTO `users` VALUES ('622', '3871bd64012152bfb53fdf04b401193f', 'taikhoan', '0869118060', 'Sales@maytinhtruongson.com.vn', '29ac98cd17193f4ce1fe80017bff7cb8', 'Phan Văn Trường', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, '0', null, '59638b308df68', 'f082409b697ee95fbd373f4078ade2e3', '0', '1499695920', null, null, null, '0');
INSERT INTO `users` VALUES ('623', 'a733fa9b25f33689e2adbe72199f0e62', 'taikhoan', '0983003484', 'cunhue@gmail.com', '3c31d5cf8058f39ef8ed267658fcae11', 'Nguyễn Trọng Hiền', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, '0', null, '59661988955c0', 'd89f5465c4496ea3cfe6a7f3b57c365a', '0', '1499863432', null, '1499863576', null, '0');
INSERT INTO `users` VALUES ('629', '051e4e127b92f5d98d3c79b195f2b291', 'taikhoan', '0975279573', 'vietbk193@gmail.com', 'f1160b722eceefca344715db03d1c66b', 'Ma Thế Việt', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, '0', null, '5972f6b2ed53b', '4cd25c877db0de884d1dcf85f1211fc6', '0', '1500706482', null, '1500706576', null, '0');
INSERT INTO `users` VALUES ('628', '42e77b63637ab381e8be5f8318cc28a2', 'taikhoan', '0964278201', 'nguyenvantrisahara@gmail.com', 'ef9468922149cf75765bab2d348d64aa', 'Nguyễn Văn Trí', null, null, '21072017', '6c92927ea9071ce920efcc34f6f732c2.jpg', null, '0', null, null, '52 Đường Lê Quang Đạo Quận Nam Từ Liêm', '01', '019', '00592', null, null, null, null, null, '0', null, '5969ae9b73f4e', '878cbe26fbc949c65aaf15d3ba3019b9', '0', '1500098203', null, '1500686349', null, '0');
INSERT INTO `users` VALUES ('643', '9b698eb3105bd82528f23d0c92dedfc0', 'taikhoan', '0977160509', 'kythuatqts@gmail.com', '6054ab63b50061d8bc40e6433e2958d3', 'test qts', 'farc5l8U', null, null, null, null, '0', null, null, null, '2', null, null, null, null, null, null, null, '1', '65fe406241980fee4234747606fbb0fcbfb927eb021f16a5de230d9a36629012', null, '5689741d0d7c9a3824d297446fe57f9a', null, '1506272400', null, '1506333363', null, '0');
INSERT INTO `users` VALUES ('644', '8c7bbbba95c1025975e548cee86dfadc', 'taikhoan', '0985554522', 'Vananh@gmail.com', 'cdb6962bc528e37a4b44d77bba500f71', 'Vân', '20X-efY5', null, null, null, null, '0', null, null, null, '2', null, null, null, null, null, null, null, '1', '09c7375321d2ce9a405e4c1606850ccdb7413aed9db60ec941a374a31c42f129', null, '418873c9025d4b7ea6037b649101bd67', null, '1506272400', null, '1506330986', null, '0');
INSERT INTO `users` VALUES ('638', '4c27cea8526af8cfee3be5e183ac9605', 'taikhoan', '0982255552', 'buivananh.th@gmail.com', '01b080fe7398c4c669be0be9cd78792d', 'Vân', '9SZDFmt3', null, null, null, null, '0', null, null, null, '1', null, null, null, null, null, null, null, '1', '09c7375321d2ce9a405e4c1606850ccdb7413aed9db60ec941a374a31c42f129', null, '553048f16cca9be3bbd6cf0ea897dd39', null, '1505926800', null, '1506331171', null, '0');
INSERT INTO `users` VALUES ('639', '0f96613235062963ccde717b18f97592', 'taikhoan', '0982255552', 'Van@gmail.com', 'c26be8aaf53b15054896983b43eb6a65', 'Vân anh', 'S3phkf4r', null, null, null, null, '0', null, null, null, '1', null, null, null, null, null, null, null, '0', '6760ca72cfe94cd737b7a804b6f415f2d28ed2339429656e2fb086e47312517d', null, 'aec76ec422606554a14edd7ff28cee3f', null, '1505926800', null, null, null, '0');
INSERT INTO `users` VALUES ('640', '4ffce04d92a4d6cb21c1494cdfcd6dc1', 'taikhoan', '0982221989', 'cskhqts@gmail.com', '2a810c88e3cb947e85bbab2728102f0d', 'Test', 'K7Un7sVB', null, null, null, null, '0', null, null, null, '2', null, null, null, null, null, null, null, '1', '9afeb87c5bfc4b34fc5741ceb2fa3f551bfebd97824d343e4ea4717935810b40', null, '2d9e84fec0ac40a1ee3220abb13714f3', null, '1505926800', null, null, null, '0');
INSERT INTO `users` VALUES ('641', '67e103b0761e60683e83c559be18d40c', 'taikhoan', '0977160509', 'nguyendat@gmail.com', 'c26be8aaf53b15054896983b43eb6a65', 'nguyễn đát', 't1ZY5jt3', null, null, null, null, '0', null, null, null, '2', null, null, null, null, null, null, null, '0', '9219376c8a5e99a4a559fc74630803f87e49ecd18bcca1668c7623ef80ea7c5e', null, '57a4c36d67bf3e23971f7bdecec4f7a5', null, '1506272400', null, null, null, '0');

-- ----------------------------
-- Table structure for user_sms
-- ----------------------------
DROP TABLE IF EXISTS `user_sms`;
CREATE TABLE `user_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smsid` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8,
  `result` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `error` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `comment` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user_sms
-- ----------------------------
INSERT INTO `user_sms` VALUES ('5', '1130b1db-ffcb-477b-862b-040e60174a888', '76', '0974901590', 'Mã Kích Hoạt SMS : 5950ac70440c6', '100', '0', null, null, '2017-06-26 13:40:48');
INSERT INTO `user_sms` VALUES ('6', '3141f19d-e25d-46fb-9cff-9c1cdd3371fb8', '76', '0974901590', 'abc test gửi lại', '100', '0', null, 'gửi lại', '2017-06-26 13:41:39');
INSERT INTO `user_sms` VALUES ('7', null, '610', '0986839102', 'Mã Kích Hoạt SMS : 5954a8af5779f', '103', '0', 'Balance not enough to send message', null, '2017-06-29 14:13:53');
INSERT INTO `user_sms` VALUES ('8', null, '611', '0986839102', 'Mã Kích Hoạt SMS : 5954a9ed7f497', '103', '0', 'Balance not enough to send message', null, '2017-06-29 14:19:09');
INSERT INTO `user_sms` VALUES ('9', null, '612', '0965986385', 'Mã Kích Hoạt SMS : 5954b39739ebb', '103', '0', 'Balance not enough to send message', null, '2017-06-29 15:00:23');
INSERT INTO `user_sms` VALUES ('10', null, '613', '01649962597', 'Mã Kích Hoạt SMS : 5955bbaedda8d', '103', '0', 'Balance not enough to send message', null, '2017-06-30 09:47:11');
INSERT INTO `user_sms` VALUES ('11', null, '614', '987654321', 'Mã Kích Hoạt SMS : 595606e747183', '103', '0', 'Balance not enough to send message', null, '2017-06-30 15:08:07');
INSERT INTO `user_sms` VALUES ('12', null, '615', '324234234', 'Mã Kích Hoạt SMS : 5956074367a46', '99', '0', 'Phone not valid:324234234', null, '2017-06-30 15:09:39');
INSERT INTO `user_sms` VALUES ('13', null, '616', '0915460000', 'Mã Kích Hoạt SMS : 595a22e73caf4', '103', '0', 'Balance not enough to send message', null, '2017-07-03 17:56:39');
INSERT INTO `user_sms` VALUES ('14', null, '617', '01649962597', 'Mã Kích Hoạt SMS : 595ae9294eb32', '103', '0', 'Balance not enough to send message', null, '2017-07-04 08:02:33');
INSERT INTO `user_sms` VALUES ('15', null, '618', '0985088848', 'Mã Kích Hoạt SMS : 595b3b0287471', '103', '0', 'Balance not enough to send message', null, '2017-07-04 13:51:46');
INSERT INTO `user_sms` VALUES ('16', null, '619', '0985088848', 'Mã Kích Hoạt SMS : 595c4381c1481', '103', '0', 'Balance not enough to send message', null, '2017-07-05 08:40:19');
INSERT INTO `user_sms` VALUES ('17', null, '620', '0986126561', 'Mã Kích Hoạt SMS : 595f3520d9e2e', '103', '0', 'Balance not enough to send message', null, '2017-07-07 14:15:45');
INSERT INTO `user_sms` VALUES ('18', null, '621', '0987999947', 'Mã Kích Hoạt SMS : 5960999273327', '103', '0', 'Balance not enough to send message', null, '2017-07-08 15:36:34');
INSERT INTO `user_sms` VALUES ('19', null, '622', '0869118060', 'Mã Kích Hoạt SMS : 59638b308df68', '103', '0', 'Balance not enough to send message', null, '2017-07-10 21:12:00');
INSERT INTO `user_sms` VALUES ('20', null, '623', '0983003484', 'Mã Kích Hoạt SMS : 59661988955c0', '103', '0', 'Balance not enough to send message', null, '2017-07-12 19:43:52');
INSERT INTO `user_sms` VALUES ('21', null, '624', '01652724972', 'Mã Kích Hoạt SMS : 5966e56f21617', '103', '0', 'Balance not enough to send message', null, '2017-07-13 10:13:51');
INSERT INTO `user_sms` VALUES ('22', null, '625', '09164278201', 'Mã Kích Hoạt SMS : 59697ab70dbfb', '99', '0', 'Phone not valid:09164278201', null, '2017-07-15 09:15:19');
INSERT INTO `user_sms` VALUES ('23', null, '626', '0964278201', 'Mã Kích Hoạt SMS : 59697b7e356e4', '103', '0', 'Balance not enough to send message', null, '2017-07-15 09:18:38');
INSERT INTO `user_sms` VALUES ('24', null, '627', '09642728201', 'Mã Kích Hoạt SMS : 59697cba3fe16', '99', '0', 'Phone not valid:09642728201', null, '2017-07-15 09:23:54');
INSERT INTO `user_sms` VALUES ('25', null, '628', '0964278201', 'Mã Kích Hoạt SMS : 5969ae9b73f4e', '103', '0', 'Balance not enough to send message', null, '2017-07-15 12:56:43');
INSERT INTO `user_sms` VALUES ('26', null, '629', '0975279573', 'Mã Kích Hoạt SMS : 5972f6b2ed53b', '103', '0', 'Balance not enough to send message', null, '2017-07-22 13:54:43');
INSERT INTO `user_sms` VALUES ('27', null, '630', '01648464081', 'Mã Kích Hoạt SMS : 5974f19ddd13a', '103', '0', 'Balance not enough to send message', null, '2017-07-24 01:57:34');

-- ----------------------------
-- Table structure for video
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `link_video` text CHARACTER SET utf8,
  `title_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `keyword_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `home` tinyint(1) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `alias` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES ('1', 'video cho em gần anh thêm chút nữa', '<p>n&ocirc;i dung video h&aacute;t rất hay nh&eacute;</p>\r\n', 'OcpO-cjIKYM', '', '', '', 'vi', '3', '1', null, null, '1', 'upload/img/video/dia-diem-du-lich-5.jpg', '1', 'video-cho-em-gan-anh-them-chut-nua');
INSERT INTO `video` VALUES ('2', 'Bài hát giành cho người đang yêu', '<p>nội dung m&ocirc; tả</p>\r\n', 'EcgL7jBEclc', '', '', '', 'vi', '5', '1', null, '1', '2', 'upload/img/video/dia-diem-du-lich-3.jpg', '1', 'bai-hat-gianh-cho-nguoi-dang-yeu');

-- ----------------------------
-- Table structure for video_category
-- ----------------------------
DROP TABLE IF EXISTS `video_category`;
CREATE TABLE `video_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `home` tinyint(1) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  `focus` tinyint(1) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `title_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_seo` text CHARACTER SET utf8,
  `keyword_seo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lang` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of video_category
-- ----------------------------
INSERT INTO `video_category` VALUES ('3', 'Danh mục video của năm', 'danh-muc-video-cua-nam', '1', '1', null, null, 'upload/img/video/dia-diem-du-lich-4.jpg', '', '', null, 'vi', '<p>nội dung m&ocirc; tả</p>\r\n', null);
INSERT INTO `video_category` VALUES ('4', 'danh mục video của năm 2018', 'danh-muc-video-cua-nam-2018', '2', '1', '1', null, 'upload/img/video/dia-diem-du-lich-41.jpg', '', '', null, 'vi', '<p>nội dung m&ocirc; tả</p>\r\n', null);
INSERT INTO `video_category` VALUES ('5', 'video năm 2019', 'video-nam-2019', '3', '1', null, null, null, '', '', null, 'vi', '<p>n&ocirc;i dung m&ocirc; tả</p>\r\n', '3');

-- ----------------------------
-- Table structure for ward
-- ----------------------------
DROP TABLE IF EXISTS `ward`;
CREATE TABLE `ward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `pre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `districtid` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ward
-- ----------------------------

-- ----------------------------
-- Table structure for wishlist
-- ----------------------------
DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `pro_id` decimal(21,0) DEFAULT NULL,
  `user_id` decimal(21,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of wishlist
-- ----------------------------
