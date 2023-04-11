-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Nis 2023, 23:44:54
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_template` varchar(255) NOT NULL,
  `category_seo` varchar(1500) NOT NULL,
  `category_order` int(11) NOT NULL DEFAULT '0',
  `category_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_url`, `category_template`, `category_seo`, `category_order`, `category_date`) VALUES
(8, 'PHP', 'php-dersleri', '', '{\"title\":\"Php Videolu Dersler\",\"description\":\"Php ile alakal\\u0131 videolu dersler\"}', 0, '2023-04-04 23:29:14'),
(9, 'CSS', 'css-dersleri-test', '', '{\"title\":\"Css Dersleri\",\"description\":\"Css ile alakal\\u0131 bilgiler\"}', 2, '2023-04-04 23:29:40'),
(10, 'PDO', 'pdo-database', '', '{\"title\":\"pdo-i\\u015flemleri\",\"description\":\"veritabani ile alakal\\u0131 i\\u015flem bilgileri\"}', 1, '2023-04-04 23:29:51'),
(11, 'JQUERY', 'jquery-dersleri', '', '{\"title\":\"jQuery Dersleri\",\"description\":\"jQuery Dersleri Emre Akg\\u00f6z\"}', 0, '2023-04-08 12:26:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_user_id`, `comment_post_id`, `comment_name`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 1, 5, 'EmreAkgoz2', 'baranemreakgoz@gmail.com', 'test eduteewrw', 1, '2023-04-09 13:28:57'),
(2, 1, 5, 'EmreAkgoz2', 'baranemreakgoz@gmail.com', 'Bu bir deneme 2.kez deniyorum lan', 1, '2023-04-09 13:51:25'),
(3, 0, 5, 'Çakma Emre Akgöz', 'frestly8@hotmail.com', 'Ziyaretçi yorum testi', 1, '2023-04-09 13:53:56'),
(4, 0, 5, '2.cakma emre', 'frestly8@hotmail.com', 'ziyaretçi 2.test', 1, '2023-04-09 13:54:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_read` int(11) NOT NULL DEFAULT '0',
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_read_date` varchar(255) NOT NULL,
  `contact_read_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_subject`, `contact_message`, `contact_read`, `contact_date`, `contact_read_date`, `contact_read_user`) VALUES
(6, 'Baran Emre Akgöz', 'baranemreakgoz@gmail.com', '', 'sadas', 'asdasdasdasdas', 1, '2023-04-03 00:23:06', '2023-04-03 22:13:35', 1),
(7, 'Baran Emre Akgöz', 'baranemreakgoz@gmail.com', '', 'allahına kurban', 'vallaha yapıyoruz bu işi oluyor galib', 1, '2023-04-03 00:23:23', '2023-04-03 22:08:43', 1),
(8, 'asdsadsa', 'baranemreakgoz@gmail.com', '05069888043', 'asdasdas', 'asdsadasdas', 0, '2023-04-09 23:06:43', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `menu_content` text NOT NULL,
  `menu_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_title`, `menu_content`, `menu_date`) VALUES
(1, 'Header Menü', '[{\"title\":\"Anasayfa\",\"url\":\"\"},{\"title\":\"Hakk\\u0131mda\",\"url\":\"sayfa\\/hakkimda\"},{\"title\":\"Blog\",\"url\":\"blog\"},{\"title\":\"Referanslar\",\"url\":\"referanslar\",\"submenu\":[{\"title\":\"Web Tasarim\",\"url\":\"referanslar\\/web-tasarim\"},{\"title\":\"Web Yaz\\u0131l\\u0131m\",\"url\":\"referanslar\\/web-yazilim\"},{\"title\":\"Mobil Uygulama\",\"url\":\"referanslar\\/mobil-uygulama\"}]},{\"title\":\"\\u0130letisim\",\"url\":\"iletisim\"}]', '2023-03-31 01:10:43'),
(4, 'Footer Sosyal Ağlar', '[{\"title\":\"&lt;i class=&quot;fab fa-twitter-square&quot;&gt; &lt;\\/i&gt; Emre Akg\\u00f6z\",\"url\":\"https:\\/\\/twitter.com\\/Solskin8\"},{\"title\":\"&lt;i class=&quot;fab fa-instagram&quot;&gt;&lt;\\/i&gt; Emre Akg\\u00f6z\",\"url\":\"https:\\/\\/instagram.com\\/bemreakgz\"},{\"title\":\"&lt;i class=&quot;fab fa-linkedin&quot;&gt; &lt;\\/i&gt; Emre Akg\\u00f6z\",\"url\":\"https:\\/\\/linkedin.com\\/in\\/baran-emre-akg%C3%B6z-267b3596\"},{\"title\":\"&lt;i class=&quot;fab fa-facebook-square&quot;&gt;&lt;\\/i&gt; Emre Akg\\u00f6z\",\"url\":\"https:\\/\\/facebook.com\\/emre.akgoz.54\"}]', '2023-03-31 23:16:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `page_seo` varchar(1000) NOT NULL,
  `page_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_url`, `page_content`, `page_seo`, `page_date`) VALUES
(2, 'Hakkimda', 'hakkimda', '&lt;div class=&quot;row&quot; style=&quot;box-sizing: border-box; display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;&quot;&gt;\r\n&lt;div class=&quot;col-md-12&quot; style=&quot;box-sizing: border-box; position: relative; width: 1140px; min-height: 1px; padding-right: 15px; padding-left: 15px; -webkit-box-flex: 0; flex: 0 0 100%; max-width: 100%;&quot;&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; font-weight: bolder;&quot;&gt;Ankara\'da&lt;/span&gt; doğdum ve hala ankara\'da yaşamaktayım. Gezmeyi ve yeni şeyler &amp;ouml;ğrenmeyi &amp;ccedil;ok seviyorum. &lt;span style=&quot;box-sizing: border-box; font-weight: bolder;&quot;&gt;Yeni fikirler&lt;/span&gt;&amp;nbsp;her zaman beni heyecanlandırıyor. &amp;Uuml;zerinde &amp;ccedil;alıştığım bir fikrim var ise, bitirene kadar rahat bir uyku &amp;ccedil;ekemem.&lt;/p&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;&quot;&gt;Sekt&amp;ouml;re g&amp;uuml;zel bir başlangı&amp;ccedil; yapmayı istiyorum. &amp;Ouml;ğrenmeyi seven birisiyim. Bundan &amp;ouml;nce oyun sekt&amp;ouml;r&amp;uuml;nde bazı işler ve projeler yaptım ancak sekt&amp;ouml;r değiştirmeye karar verdim.&lt;/p&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;&quot;&gt;Yazılım dili olarak şu anlık&amp;nbsp; &lt;span style=&quot;box-sizing: border-box; font-weight: bolder;&quot;&gt;PHP&lt;/span&gt;,&amp;nbsp; olmak ile birlikte laravel-javascript yazılım dillerini &amp;ouml;ğrenip kendimi geliştirmeyi planlıyorum. &amp;Ccedil;alışırken m&amp;uuml;zik dinlemeye bayılırım, belli bir şeye odaklanmama yardımcı oluyor.&lt;/p&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;&quot;&gt;Kod yazarken &lt;strong&gt;VsCode &lt;/strong&gt;IDE&amp;rsquo;sini kullanıyorum.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '{\"title\":\"Hakkimda\",\"description\":\"\"}', '2023-04-05 00:25:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_categories` varchar(255) NOT NULL,
  `post_short_content` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `post_seo` varchar(1000) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_url`, `post_content`, `post_categories`, `post_short_content`, `post_status`, `post_seo`, `post_date`) VALUES
(5, 'PHP İLE EXCEL DOSYALARINI OKUMAk', 'php-excel', '&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;&quot;&gt;&lt;a style=&quot;box-sizing: border-box; color: #007bff; text-decoration-line: none; background-color: transparent;&quot; href=&quot;https://www.erbilen.net/php-excel/&quot;&gt;Şu yazımda&lt;/a&gt;&amp;nbsp;php ile nasıl excel dosyası oluşturulacağını g&amp;ouml;stermiştim. Bu yazımda ise, daha elzem bir konuya değineceğiz. Ge&amp;ccedil;enlerde bir excel dosyasının i&amp;ccedil;inden verileri almam gerekti, araştırırken baktım ki &amp;ccedil;ok kalabalık kodlar var, benim amacım alt tarafı satır satır okuyup verileri almak o kadar. Sonra bir repo&amp;rsquo;ya denk geldim, Sergey Shuchkin abimiz bir sınıf yazmış bu işlemler i&amp;ccedil;in. Basit, kullanışlı, amaca hitap ediyor.&lt;/p&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;&quot;&gt;&amp;Ouml;ncelikle dosyaları şuradan temin edin;&lt;br style=&quot;box-sizing: border-box;&quot; /&gt;&lt;a style=&quot;box-sizing: border-box; color: #007bff; text-decoration-line: none; background-color: transparent;&quot; href=&quot;https://github.com/shuchkin/simplexlsx&quot;&gt;https://github.com/shuchkin/simplexlsx&lt;/a&gt;&amp;nbsp;(not: adama star atmayı unutmayın :D)&lt;/p&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;&quot;&gt;Kullanımı ise &amp;ccedil;ok basit;&lt;/p&gt;\r\n&lt;pre style=&quot;box-sizing: border-box; font-family: SFMono-Regular, Menlo, Monaco, Consolas, \'Liberation Mono\', \'Courier New\', monospace; margin-top: 0px; margin-bottom: 1rem; overflow: auto; color: #212529; background: #f5f5f5; padding: 10px; border-radius: 3px;&quot;&gt;if ( $xlsx = SimpleXLSX::parse(\'test.xlsx\') ) {\r\n    print_r( $xlsx-&amp;gt;rows() );\r\n} else {\r\n    echo SimpleXLSX::parse_error();\r\n}&lt;/pre&gt;\r\n&lt;p style=&quot;box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;&quot;&gt;excel&amp;rsquo;deki satırları dizi halinde size verecek, se&amp;ccedil;ip istediğinizi kullanabilirsiniz.&lt;/p&gt;', '10,8', '&lt;p&gt;&lt;a style=&quot;box-sizing: border-box; color: #007bff; text-decoration-line: none; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;&quot; href=&quot;https://www.erbilen.net/php-excel/&quot;&gt;Şu yazımda&lt;/a&gt;&lt;span style=&quot;color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;&quot;&gt;&amp;nbsp;php ile nasıl excel dosyası oluşturulacağını g&amp;ouml;stermiştim. Bu yazımda ise, daha elzem bir konuya değineceğiz. Ge&amp;ccedil;enlerde bir excel dosyasının i&amp;ccedil;inden verileri almam gerekti, araştırırken baktım ki &amp;ccedil;ok kalabalık kodlar var, benim amacım alt tarafı satır satır okuyup verileri almak o kadar. Sonra bir repo&amp;rsquo;ya denk geldim, Sergey Shuchkin abimiz bir sınıf yazmış bu işlemler i&amp;ccedil;in. Basit, kullanışlı, amaca hitap ediyor.&lt;/span&gt;&lt;/p&gt;', 1, '{\"title\":\"PHP \\u0130LE EXCEL \\u0130\\u015eLEMLER\\u0130\",\"description\":\"php ile ilgili i\\u015flemler\"}', '2023-04-05 21:45:56'),
(6, 'test-ediyorum', 'test-ediyorum-seourl', '&lt;p&gt;asdsad&lt;/p&gt;', '9,10', '&lt;p&gt;asdas&lt;/p&gt;', 1, '{\"title\":\"asdsa\",\"description\":\"asdsa\"}', '2023-04-07 12:52:00'),
(8, '2.test-ediyorum', '2-test-ediyorum', '&lt;p&gt;ewstse&lt;/p&gt;', '9,11,10,8', '&lt;p&gt;setset&lt;/p&gt;', 1, '{\"title\":\"asdsa\",\"description\":\"asdas\"}', '2023-04-08 12:44:58'),
(9, '3.test', '3-test-url-seo', '&lt;p&gt;3&lt;/p&gt;', '9,11,10,8', '&lt;p&gt;3&lt;/p&gt;', 1, '{\"title\":\"test-url-seo\",\"description\":\"test-seo\"}', '2023-04-08 13:28:12'),
(10, 'test5', 'test5', '&lt;p&gt;test5&lt;/p&gt;', '8', '&lt;p&gt;tset5&lt;/p&gt;', 1, '{\"title\":\"tse5\",\"description\":\"5est5\"}', '2023-04-08 13:59:45'),
(11, 'test67', 'test6', '&lt;p&gt;test6&lt;/p&gt;', '10', '&lt;p&gt;test6&lt;/p&gt;', 1, '{\"title\":\"test6\",\"description\":\"test6\"}', '2023-04-08 14:00:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(11) NOT NULL,
  `tag_post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `post_tags`
--

INSERT INTO `post_tags` (`id`, `tag_post_id`, `tag_id`) VALUES
(11, 5, 9),
(14, 6, 12),
(15, 6, 13),
(16, 6, 14),
(17, 7, 15),
(18, 7, 16),
(19, 8, 17),
(20, 8, 18),
(21, 9, 19),
(22, 9, 20),
(23, 9, 21),
(24, 10, 12),
(25, 10, 13),
(26, 10, 14),
(27, 10, 22),
(28, 11, 23),
(29, 11, 24),
(30, 11, 19),
(31, 11, 20),
(32, 11, 25),
(33, 11, 26);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reference`
--

CREATE TABLE `reference` (
  `reference_id` int(11) NOT NULL,
  `reference_title` varchar(255) NOT NULL,
  `reference_url` varchar(255) NOT NULL,
  `reference_content` text NOT NULL,
  `reference_tags` varchar(5000) NOT NULL,
  `reference_demo` varchar(255) NOT NULL,
  `reference_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reference_image` varchar(255) NOT NULL,
  `reference_categories` varchar(255) NOT NULL,
  `reference_seo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reference`
--

INSERT INTO `reference` (`reference_id`, `reference_title`, `reference_url`, `reference_content`, `reference_tags`, `reference_demo`, `reference_date`, `reference_image`, `reference_categories`, `reference_seo`) VALUES
(9, 'Uzman Emre', '1', '&lt;p&gt;Bişeyleri test ediyoruz.&lt;/p&gt;', 'php,mysql,jQuery,html,css', 'https://uzmancevap.org', '2023-04-11 02:04:20', '1_1999.jpg', '4,3,1,2', '{\"title\":\"\",\"description\":\"\"}'),
(10, 'Test için', '', '&lt;p&gt;test&lt;/p&gt;', 'test,ve test,testçik', 'https://uzmancevap.org', '2023-04-11 18:05:41', '5100.jpg', '4,2', '{\"title\":\"teset\\u00e7in\",\"description\":\"adskadlasd\"}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reference_categories`
--

CREATE TABLE `reference_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_template` varchar(255) NOT NULL,
  `category_seo` varchar(1500) NOT NULL,
  `category_order` int(11) NOT NULL DEFAULT '0',
  `category_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reference_categories`
--

INSERT INTO `reference_categories` (`category_id`, `category_name`, `category_url`, `category_template`, `category_seo`, `category_order`, `category_date`) VALUES
(1, 'Web Tasarım2', 'web-tasarim', '', '{\"title\":\"yeni ba\\u015fl\\u0131k\",\"description\":\"yeni a\\u00e7\\u0131klama\"}', 1, '2023-04-10 12:32:32'),
(2, 'Web Yazılım', 'web-yazilim', '', '{\"title\":\"\",\"description\":\"\"}', 2, '2023-04-10 12:32:49'),
(3, 'Mobil Uygulama', 'mobil-uygulama', '', '{\"title\":\"\",\"description\":\"\"}', 3, '2023-04-10 12:32:58'),
(4, 'Emre\'nin Sihirli Projesi', 'emre-nin-sihirli-projesi', '', '{\"title\":\"\",\"description\":\"\"}', 0, '2023-04-10 12:33:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reference_images`
--

CREATE TABLE `reference_images` (
  `image_id` int(11) NOT NULL,
  `image_reference_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `image_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_url` varchar(255) NOT NULL,
  `tag_seo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `tag_url`, `tag_seo`) VALUES
(7, 'php excel\r', 'php-excel', ''),
(8, 'php simplexls\r', 'php-simplexls', ''),
(9, 'php parse\r', 'php-parse', ''),
(10, 'php excel dosyası', 'php-excel-dosyasi', ''),
(11, 'yeni etiket', 'yeni-etiket', ''),
(12, 'a', 'a', ''),
(13, 'b', 'b', ''),
(14, 'c', 'c', ''),
(15, 'css', 'css', ''),
(16, 'bilgi', 'bilgi', ''),
(17, 'test', 'test', ''),
(18, 'estest', 'estest', ''),
(19, '3', '3', ''),
(20, '4', '4', ''),
(21, '45', '45', ''),
(22, 'd', 'd', ''),
(23, '1', '1', ''),
(24, '2', '2', ''),
(25, '5', '5', ''),
(26, '66', '66', '{\"title\":\"asdklasdls\",\"description\":\"asldkasldas\"}'),
(27, 'yeni etiket', 'yeyeni-etiket', '{\"title\":\"yeni etiket\",\"description\":\"yeni etiket\"}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_url` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_rank` int(11) NOT NULL DEFAULT '3',
  `user_permissions` varchar(2000) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_url`, `user_email`, `user_password`, `user_rank`, `user_permissions`, `user_date`) VALUES
(1, 'EmreAkgoz2', 'emreakgoz2', 'baranemreakgoz@gmail.com', '$2y$10$OeKTy6irqg/V0DJ4F6Uw8uL8kDyhgceMHyQMpmQu8R5lbMmNFn6ZW', 1, '{\"index\":{\"show\":\"1\"},\"users\":{\"show\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"menu\":{\"show\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"settings\":{\"show\":\"1\",\"edit\":\"1\"}}', '2023-03-30 00:20:34'),
(2, 'eeerreee', 'eeerreee', 'frestly8@hotmail.com', '$2y$10$0hMWSjLNhCH/xqYrfj5S3.on.Xje4NtCoob5PfmRqVGSQI9lNDpra', 1, '{\"index\":{\"show\":\"1\"},\"users\":{\"show\":\"1\",\"edit\":\"1\"},\"settings\":{\"show\":\"1\"}}', '2023-03-30 00:22:10');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`reference_id`);

--
-- Tablo için indeksler `reference_categories`
--
ALTER TABLE `reference_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `reference_images`
--
ALTER TABLE `reference_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `reference`
--
ALTER TABLE `reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `reference_categories`
--
ALTER TABLE `reference_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `reference_images`
--
ALTER TABLE `reference_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
