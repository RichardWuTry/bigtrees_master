-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 20 日 14:04
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bigtrees`
--
CREATE DATABASE IF NOT EXISTS `bigtrees` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bigtrees`;

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `subtitle` varchar(40) NOT NULL,
  `image_path` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(80) NOT NULL,
  `posted_at` datetime NOT NULL,
  `priority` tinyint(3) unsigned zerofill NOT NULL DEFAULT '000',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`article_id`, `title`, `subtitle`, `image_path`, `content`, `tags`, `posted_at`, `priority`, `is_active`, `created_at`) VALUES
(1, 'Kiah Roache-Turner', 'Feature film-maker (Wyrmwood)', '2013/kiah.roache-turner.jpg', '<h4>Who are you, and what do you do?</h4>\r\n\r\n<p>My name is Kiah Roache-Turner and I guess I could say that I’m an advertising director &amp; (more recently) a feature film-maker… but that would not be the case. What I am is an individual who is COMPLETELY AND UTTERLY OBSESSED with films. An absolute film geek and movie obsessive. All I ever wanted to be and all I ever will be is a Movie Director. In my civilian life I work for a fashion company part time creating online content and spend the other half of my REEL life making films, music videos and occasionally digital art for digital art’s sake.</p>\r\n\r\n<p>I just finished shooting my first full-length film ‘<a href="https://www.facebook.com/wyrmwoodmovie" title="Wyrmwood''s Facebook page.">Wyrmwood</a>’ - a fantasy/horror/sci-fi/action/post-apocalyptic mash-up of a movie that took me and my producer brother 3 years to complete. It’s been the most difficult and rewarding thing I’ve ever attempted in my life. I poured my entire heart and soul into the project and bled sweat and tears to make sure I made one hell-ovva’ kick-arse first film and I feel I’ve succeeded - only time will tell, however… it’ll come out early next year.  </p>\r\n\r\n<h4>What hardware do you use?</h4>\r\n\r\n<p>I just bought a new <a href="http://www.apple.com/imac/" title="The all-in-one Mac.">iMac</a> with which to edit the rough-cut of my fillum and it’s been working like a dream. As an arty aesthete I LOVE the design and workflow of Macs, however I hear that a custom-built PC gives you more grunt for your bucks and as I do a fair bit of complicated 3D rendering at work we recently made the switch (literally yesterday) so I may become a convert yet.</p>\r\n\r\n<p>I’ve shot pretty consistently on Canon DSLR’s (the <a href="http://www.usa.canon.com/consumer/controller?act=ModelInfoAct&amp;fcategoryid=139&amp;modelid=11933" title="A 12 megapixel DSLR.">5D1</a>, the <a href="http://www.usa.canon.com/consumer/controller?act=ModelInfoAct&amp;fcategoryid=139&amp;modelid=17662" title="A 21 megapixel DSLR.">5D2</a> &amp; the <a href="http://en.wikipedia.org/wiki/Canon_EOS-1D" title="A 4 megapixel DSLR.">1D</a>) for the last few years. I think for certain projects (especially online work) these cameras are great - however, I’ve recently started using some much sexier cams and to be honest the difference is pretty huge. For ease of use and picture quality the <a href="http://www.usa.canon.com/cusa/professional/products/professional_cameras/cinema_eos_cameras/eos_c300" title="A 35mm digital video camera.">Canon C300</a> and the <a href="http://pro.sony.com/bbsc/ssr/product-NEXFS700UK/" title="A 4k digital video camera.">Sony FS700</a> are brilliant and the fact that you can do ‘HD’ 200 frames-per-second slow motion on the Sony is a HUGE plus for me.</p>\r\n\r\n<p>The <a href="http://www.red.com/products/epic/" title="A high-end 4k digital video camera.">Red EPIC</a> and the <a href="http://www.red.com/products/scarlet" title="A high-end 4k digital video camera.">Red Scarlet</a> are amazing cameras also - I shot a big chunk of my feature on these guys and was massively impressed with the results. They’ve got a very filmic look and the 4k RAW file capabilities give you an amount of flexibility in the ‘post grading’ process that the other cameras can’t come close to. I would certainly never think of shooting another film on a camera that coudn’t shoot in this format. I’m a big believer that if you’re good enough at what you do you should be able to make something as beautiful and moving with a 5 dollar camera as another guy could make with a hundred thousand dollar camera but… well, damn but you just can’t help but love those high-end toys!</p>\r\n\r\n<h4>And what software?</h4>\r\n\r\n<p>I recently made the switch from <a href="http://www.apple.com/finalcutstudio/finalcutpro/" title="A nonlinear video editor.">Final Cut Pro</a> to <a href="http://www.adobe.com/products/premiere.html" title="A video editing suite.">Adobe Premiere</a> (for editing) and am (after only one day of cutting) a no-holds-barred convert. It is superior in every way, an absolute dream for any filmmaker to work with and not too hard to learn at all. I love that fact that you can drag any type of video file format directly onto the timeline without pre-conversion and the interactive ‘video thumbnails’ save a gargantuan amount of time when sorting through footage. I use <a href="http://www.adobe.com/products/aftereffects/" title="Motion graphics and video editing software.">After Effects</a> for all my 3D title &amp; design work and <a href="http://adobe.com/products/photoshop/" title="The infamous graphic editor.">Photoshop</a> a fair bit for various bits and pieces. I write all my scripts in <a href="http://www.finaldraft.com/products/final-draft/" title="Popular screenwriting software.">Final Draft</a> (a great program for writers) and a bunch of other programs that really aren’t worth mentioning.</p>\r\n\r\n<h4>What would be your dream setup?</h4>\r\n\r\n<p>To be completely honest the longer I make films the longer I realise that my dream setup would probably be that everybody does everything for me - from a technical standpoint anyway. I’m fast learning that there are a lot of people out there who are far more technically minded than I am and far better at what they do but there are not many people who are better at speaking the language of cinema (that I know) and that is really what I should stick to.</p>\r\n\r\n<p>Having said that, the one possible exception is probably editing - I truly love losing myself in an edit and tend to prefer to do it solo. So…  my dream setup would be the latest disgustingly expensive Mac processor with three huge monitors, large subwoofers in a roomy, dark, leather-padded room with lush couches, a bar-fridge and a Thai masseuse on speed-dial waiting to assist me with the inevitable RSI that comes with editing 24 hours a day for months. Is that too much to ask?</p>', 'film,mac', '2013-11-19 20:24:46', 000, 1, '2013-11-19 20:24:52');
