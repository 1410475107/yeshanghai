-- --------------------------------------------------------
-- 主机:                           localhost
-- 服务器版本:                        5.5.53 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.5.0.5220
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出  表 shanghai1807.admin 结构
CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL COMMENT '账号',
  `passwd` char(32) DEFAULT NULL COMMENT '密码',
  `loginnums` int(11) DEFAULT '0' COMMENT '登录次数',
  `lasttimes` datetime DEFAULT NULL COMMENT '最后一次登录时间',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

-- 正在导出表  shanghai1807.admin 的数据：0 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`aid`, `username`, `passwd`, `loginnums`, `lasttimes`) VALUES
	(1, '沈斌', 'e10adc3949ba59abbe56e057f20f883e', 4, '2018-10-15 10:50:11'),
	(2, '张计荣', 'e10adc3949ba59abbe56e057f20f883e', 1, '2018-10-15 10:38:09');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
