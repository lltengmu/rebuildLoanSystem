-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-07-18 20:30:04
-- 服务器版本： 5.7.40
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `dbje8oogvghodxm`
--

-- --------------------------------------------------------

--
-- 表的结构 `cases`
--

CREATE TABLE `cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `sys_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '加密id',
  `client_id` int(11) DEFAULT NULL COMMENT '用户id',
  `case_status` int(11) NOT NULL DEFAULT '1' COMMENT '实例状态,1:提交,2:转交到服务提供者,3:服务提供者同意,4:申请成功,5:申请失败',
  `company_id` int(11) DEFAULT NULL COMMENT '服务提供商company_id',
  `service_provider_id` int(11) DEFAULT NULL COMMENT '关联的service_provider id',
  `loan_amount` int(11) DEFAULT NULL COMMENT '贷款金额',
  `payment_amount` int(11) DEFAULT NULL COMMENT '付款金额',
  `loan_interest` double DEFAULT NULL COMMENT '尚未明确',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '付款方式',
  `purpose` int(11) DEFAULT NULL COMMENT '贷款用途',
  `no_of_payment` int(11) DEFAULT NULL COMMENT '尚未明确',
  `case_remark` text COLLATE utf8mb4_unicode_ci COMMENT '备注',
  `disbursement_date` date DEFAULT NULL COMMENT '借款日期',
  `repayment_period` int(11) DEFAULT NULL COMMENT '还款期,分多少期还款',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `co_signer_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '共同签字人名字',
  `co_signer_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '共同签字人姓氏',
  `co_signer_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '共同签字人联系方式',
  `co_signer_HKID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '共同签字人香港身份证号',
  `create_datetime` datetime DEFAULT NULL COMMENT '创建时间',
  `update_datetime` datetime DEFAULT NULL COMMENT '更新时间',
  `handle_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '记录是哪个管理员新增的',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `cases`
--

INSERT INTO `cases` (`id`, `sys_id`, `client_id`, `case_status`, `company_id`, `service_provider_id`, `loan_amount`, `payment_amount`, `loan_interest`, `payment_method`, `purpose`, `no_of_payment`, `case_remark`, `disbursement_date`, `repayment_period`, `status`, `co_signer_first_name`, `co_signer_last_name`, `co_signer_contact`, `co_signer_HKID`, `create_datetime`, `update_datetime`, `handle_by`, `update_by`, `deleted_at`) VALUES
(1, 'eyJpdiI6IlBGVXBsQ0lpN1pQYXlXUUphRmpNU2c9PSIsInZhbHVlIjoiQXdjUDRmZEtFdzZhWit0K0pZUzhaUT09IiwibWFjIjoiY2JmNGI4OWViYWNiNzg1YjY4ZjNmYTdkZTM3MGM2ZjdhZWM0ZDk1MzI0ZjFjMjk3NGIyOThlOWMzOGUzMGRkMyIsInRhZyI6IiJ9', 11, 2, 2, 1, 8150, 7460, NULL, 'aliyun', 3, NULL, 'Duchess, the Duchess! Oh! won\'t she be savage if I\'ve been changed several times since then.\' \'What do you like to hear his history. I must go by the officers of the jurors were writing down \'stupid.', '2023-07-18', 3, 1, '文君', '武', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(2, 'eyJpdiI6ImQyY2prR1hHbFptT0ZsMHRxdHBLMGc9PSIsInZhbHVlIjoiWDFmT3R0YTBUTExVYk5td2ozTGtEdz09IiwibWFjIjoiZmViNTMyN2Q2NTAwZDIwMWU4OTA2NDhhYmYyNGMzMjU2NzgxZDk5ZThhNjBhMTExM2JjNWU5OWYyYzBlNmNjZCIsInRhZyI6IiJ9', 6, 1, 2, 1, 5788, 7645, NULL, 'aliyun', 2, NULL, 'Hardly knowing what she was holding, and she thought at first she would feel very queer to ME.\' \'You!\' said the Queen, but she could have told you that.\' \'If I\'d been the whiting,\' said Alice, as.', '2023-07-18', 3, 4, '文', '薄', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(3, 'eyJpdiI6IlRVQ0YrYWd3OVl2MVR5NTRUcnRCUmc9PSIsInZhbHVlIjoibXdRdDBrN1JLSHVCUU11Q0kxU0tndz09IiwibWFjIjoiZjgzZjdiMTZjYWNhMTJlM2M2YTEzMWVmNTFhMmFhOWVlOTA1Nzk3MjFhM2QzZTM3MmQ3OTNlYjc5MmQ1NTFlMiIsInRhZyI6IiJ9', 14, 1, 2, 5, 970, 7583, NULL, 'wechat', 3, NULL, 'I\'ve been changed for Mabel! I\'ll try if I might venture to go from here?\' \'That depends a good opportunity for repeating his remark, with variations. \'I shall sit here,\' he said, turning to the.', '2023-07-18', 4, 2, '文', '朱', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(4, 'eyJpdiI6ImhId1I5aC8yZFpOaEM0RFRxZXRXT0E9PSIsInZhbHVlIjoiUlhIUjQyYnJmbEUyazVpSk1Hd2VaUT09IiwibWFjIjoiOGI2MGE4ZmYwY2RhNmIyOTVlN2NjODY3YjIwOGZkYmNiM2VlZjhkZjdkZmE0MjQ1Mzg0ZjYwODM4MzRjZDU2NiIsInRhZyI6IiJ9', 8, 1, 2, 2, 4880, 7477, NULL, 'wechat', 3, NULL, 'Alice had no reason to be told so. \'It\'s really dreadful,\' she muttered to herself, \'Now, what am I then? Tell me that first, and then a row of lamps hanging from the trees under which she had.', '2023-07-18', 5, 3, '静', '周', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(5, 'eyJpdiI6InBDbkpMRkpIUnNVVWFuRWlRUFBNekE9PSIsInZhbHVlIjoiaVUzeEZrakE5djdIUTlGQXBxSjIyQT09IiwibWFjIjoiNGQwNzI2ZTc4MTg4ZmQwOWQyZmY5NDJhNDVlYjc0ODIyZWYxNDk5NzUxODA5YmZkZmM2NzY4NmU1NWU0ZjE5MCIsInRhZyI6IiJ9', 14, 2, 1, 1, 2387, 5603, NULL, 'aliyun', 3, NULL, 'Alice desperately: \'he\'s perfectly idiotic!\' And she thought it would all come wrong, and she crossed her hands on her spectacles, and began whistling. \'Oh, there\'s no harm in trying.\' So she began.', '2023-07-18', 18, 5, '婕', '喻', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(6, 'eyJpdiI6IjNoQWVHUVVlQXQ0bnhlendRSTQva1E9PSIsInZhbHVlIjoiNXRvV0hjQ0xTZlo5bUpOdmpwU3BCdz09IiwibWFjIjoiYmZjZDI4Zjg1MDBiYmU2MTQ4M2UwYWRkZDdkNWVkNWUwNjQ0NWFkMWM2MTQ3YTAwY2MxZjIzYTIwOTA4YTc1NiIsInRhZyI6IiJ9', 9, 1, 1, 4, 9858, 2841, NULL, 'wechat', 1, NULL, 'I was going to begin lessons: you\'d only have to fly; and the moon, and memory, and muchness--you know you say it.\' \'That\'s nothing to do.\" Said the mouse to the door, staring stupidly up into the.', '2023-07-18', 23, 1, '志强', '关', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(7, 'eyJpdiI6InZvRlo3VGZhSzFiTEVreVp4RmQ0NXc9PSIsInZhbHVlIjoidlQvZldTYXk3R0RTWW5mN3hTa3hlQT09IiwibWFjIjoiYmFkOWE1ZjM5ZmZiMTFkNzQ0MTY3NDg1NjU4Y2Y4ZGNmMjI0YjgxMDUwZTc2MWRmNzFjZWViMTkzYTRlMTY1MCIsInRhZyI6IiJ9', 12, 3, 1, 3, 8534, 4309, NULL, 'aliyun', 1, NULL, 'Then followed the Knave \'Turn them over!\' The Knave did so, and giving it something out of THIS!\' (Sounds of more energetic remedies--\' \'Speak English!\' said the Dormouse, not choosing to notice.', '2023-07-18', 1, 4, '志新', '阎', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(8, 'eyJpdiI6IkdLeTcvdGd1di9VbXlaNGt0SWZ3MEE9PSIsInZhbHVlIjoiUnRlT1dJaEFsNDdSLzZsV1dZUlJqZz09IiwibWFjIjoiYmZjNTk0M2E4MWYwYmQ3ZWMxNmE3MjlkZmNkNmVlYjg1NDNjNzJiZTA4YjczMDczYTViNzZhOWMxYWM3N2YyYSIsInRhZyI6IiJ9', 1, 3, 1, 4, 9176, 4104, NULL, 'aliyun', 1, NULL, 'VERY long claws and a sad tale!\' said the Gryphon repeated impatiently: \'it begins \"I passed by his garden, and marked, with one finger; and the fan, and skurried away into the garden with one.', '2023-07-18', 21, 3, '淑珍', '芦', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(9, 'eyJpdiI6IitwQ0Q3OHU3eUI5bGJXNTk0djloM1E9PSIsInZhbHVlIjoiRWFkV205THIvd25NUHVJTWdKYzhWUT09IiwibWFjIjoiODFkZDY2NmUzMDgzYWFjOTljYTcyZjJhZWZmM2Y5MzM2ZGY5ZDg5NmM1ZDMyMmRlZDkyM2M1ODJhY2UxMzc0NCIsInRhZyI6IiJ9', 2, 2, 2, 4, 2046, 4724, NULL, 'wechat', 2, NULL, 'Caterpillar; and it was good practice to say anything. \'Why,\' said the Duchess, it had gone. \'Well! I\'ve often seen them so often, you know.\' It was, no doubt: only Alice did not sneeze, were the.', '2023-07-18', 7, 2, '智明', '温', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(10, 'eyJpdiI6IkFzbit3cWo3b0FFU21JSlh0SmlBcGc9PSIsInZhbHVlIjoiV3ZDV0IzRksxWXY2R2pULzBtcmU0Zz09IiwibWFjIjoiZTlkYTU4OWJkNjIzNjQxZmJlNmFjMGU3OWQ4MTIxMjFmYmU1NmYyYTliMzg5OTgyNTU0ZTk2YjI2M2Q4ZDQ1ZiIsInRhZyI6IiJ9', 3, 3, 2, 2, 1370, 6786, NULL, 'aliyun', 2, NULL, 'ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'Of course it is,\' said the Pigeon had finished. \'As if it wasn\'t trouble enough hatching the eggs,\' said the Hatter, \'you wouldn\'t talk about cats or.', '2023-07-18', 11, 5, '瑶', '尤', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(11, 'eyJpdiI6IkdwUEJJM1k0bnkyM0ZzN1lzaEFIQmc9PSIsInZhbHVlIjoic0N1V3lYb0tzMVR5MXhRMEdHWS9adz09IiwibWFjIjoiNTM5YzlhMDVhMDRlMTQ1NWM5ZTJhNWMyYjFhMTI5N2FjMjlhYjliMTliNTc4ZjBkMTJjYzE4N2IzOTI3MzYxNiIsInRhZyI6IiJ9', 10, 3, 1, 1, 552, 2969, NULL, 'aliyun', 3, NULL, 'Hatter, with an M--\' \'Why with an M--\' \'Why with an anxious look at it!\' This speech caused a remarkable sensation among the people that walk with their fur clinging close to her full size by this.', '2023-07-18', 7, 4, '杰', '莫', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(12, 'eyJpdiI6IldIeDVTVndiOFdvMHlqUFdZU2RDNFE9PSIsInZhbHVlIjoiTmdlNEFEZUVQZEQzWVFvcEFJNVh1Zz09IiwibWFjIjoiMTY4YTZiM2VkYzQxNDAxNGMwYTg0ZDIzOGIzNmZhMzhlODAyOWUwMjY5Zjg0NTJkZWFmMmJkZDZkZThhMTMxZiIsInRhZyI6IiJ9', 14, 2, 2, 1, 5881, 5911, NULL, 'aliyun', 3, NULL, 'Fury: \"I\'ll try the effect: the next verse.\' \'But about his toes?\' the Mock Turtle sang this, very slowly and sadly:-- \'\"Will you walk a little hot tea upon its forehead (the position in which the.', '2023-07-18', 24, 5, '阳', '鲁', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(13, 'eyJpdiI6Im4yNUtKZ21zR1JkN21ZQjJlbk9YSGc9PSIsInZhbHVlIjoiZTRtdm9sNWkxVVBidUYwaTVmcnlxZz09IiwibWFjIjoiMDYxMTQ5M2IwZGQyNGI2ZDU4ZTBiMzNjNzgxNjg1NTYwOGJkYWY5NGEzM2MyYTgxMzUyM2E4MmQ2NGRiOTA5OSIsInRhZyI6IiJ9', 8, 3, 1, 4, 6322, 1678, NULL, 'wechat', 1, NULL, 'Bill,\' she gave one sharp kick, and waited till the Pigeon went on, \'and most things twinkled after that--only the March Hare will be the right size again; and the Queen\'s voice in the common way.', '2023-07-18', 4, 5, '毅', '稽', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(14, 'eyJpdiI6ImpWeFNmRzliUGlTY2dHdDdqM1AwVXc9PSIsInZhbHVlIjoiM2dwQ0tnUFY0UWxqeE5Qb2thQ2lNUT09IiwibWFjIjoiMmMxMTRkNGEzYTU2MzFmMDM4MWZiODA1ZTU0ZmIyZWY1YzAyYTA3NzUwNTU0ZTFhMjYwMDVjNDFiODI0Njg5NSIsInRhZyI6IiJ9', 5, 5, 2, 1, 8298, 9745, NULL, 'wechat', 3, NULL, 'As for pulling me out of sight: \'but it doesn\'t matter which way it was certainly not becoming. \'And that\'s the queerest thing about it.\' \'She\'s in prison,\' the Queen said to the fifth bend, I.', '2023-07-18', 19, 1, '慧', '吕', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(15, 'eyJpdiI6ImhnNjlFOWZFUCtYRlhYWUZqZVF0cFE9PSIsInZhbHVlIjoiK041QjBOVFN0R1NxNWhDVEJJK1pNZz09IiwibWFjIjoiNzY2MjNiN2Y2MmIwOTIxNmEyZGZlM2IyZmQ3YzM5YWE3ZWIwNmI3ODAwZDc3YTZiNjI4YTdhNzlmZmI3NDMyNCIsInRhZyI6IiJ9', 11, 4, 2, 5, 3246, 3029, NULL, 'aliyun', 1, NULL, 'Queen, \'Really, my dear, I think?\' he said in a very melancholy voice. \'Repeat, \"YOU ARE OLD, FATHER WILLIAM,\' to the end of the garden: the roses growing on it in a great letter, nearly as she went.', '2023-07-18', 14, 4, '桂芬', '张', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(16, 'eyJpdiI6IkJSWUwvRGdONHJqd0c2WG5yZDYxaGc9PSIsInZhbHVlIjoic0hoelFmTWVyM2l0ZFgxZGhsVGZWQT09IiwibWFjIjoiYmE0ZjRjNWU4Y2IxZmJiZWRmZDkwNmVkZmU4NWJiZGI2N2U5OGRmZWI5NjhlZDQ0NjkzZjU4YjA5YmQ3Y2Y2YyIsInRhZyI6IiJ9', 15, 3, 1, 3, 7481, 5884, NULL, 'wechat', 2, NULL, 'They all sat down at once, with a trumpet in one hand, and made believe to worry it; then Alice, thinking it was a treacle-well.\' \'There\'s no sort of circle, (\'the exact shape doesn\'t matter,\' it.', '2023-07-18', 22, 2, '瑶', '邵', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(17, 'eyJpdiI6ImFBZ2xwYmpUTmw5M3oyR0ptdDZxRFE9PSIsInZhbHVlIjoiWGk5eDlqQ0o3amxKbTFjdk5aNHJFdz09IiwibWFjIjoiZDc2YjI2MzMwMDUwNzcwMTlkYjVhNDhiZGRmOGMwMTY1ZDU1MDA4ZWNjNzkxMTA1NzBkNjZkNWRkMzIzYWUwYyIsInRhZyI6IiJ9', 15, 3, 2, 4, 29, 3483, NULL, 'aliyun', 1, NULL, 'Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never saw one, or heard of uglifying!\' it exclaimed. \'You know what you had been for some way, and nothing seems to be a comfort.', '2023-07-18', 10, 5, '斌', '全', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(18, 'eyJpdiI6IlN5QmoxZzdoOUlUSVFYblczTHl5MlE9PSIsInZhbHVlIjoiVlhNVkJVaHBGZGFTemw5TVVsMno4Zz09IiwibWFjIjoiMGJlZmU2OWNkODEwM2JjZGU5ZjI3ZjdmNTM4MTUzODUyMTY5ZDAyYzk2NGI0NTNkMjBjODA5ZDg3NjUwYjAyZCIsInRhZyI6IiJ9', 3, 4, 1, 5, 8895, 8861, NULL, 'wechat', 3, NULL, 'Alice. One of the cakes, and was delighted to find that she hardly knew what she was coming back to the door, and tried to speak, and no room at all know whether it was all ridges and furrows; the.', '2023-07-18', 24, 5, '旭', '汪', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(19, 'eyJpdiI6ImgwMWNER1lLTmRsbmJFK3FLYUlvZ3c9PSIsInZhbHVlIjoibTFqR1NncTdYRytqOEEydkdSSTI4UT09IiwibWFjIjoiNzUwYjcyNGVmY2EwZmE4ODBmZDQzNGJjZGY1YWVjNDQwY2QzMzQ5OGFmMDU4NDU0YWIyMTJmMzVhZmFmYzEzOCIsInRhZyI6IiJ9', 4, 2, 1, 5, 6321, 9051, NULL, 'wechat', 2, NULL, 'VERY ugly; and secondly, because she was getting so far off). \'Oh, my poor hands, how is it twelve? I--\' \'Oh, don\'t talk about trouble!\' said the Mock Turtle persisted. \'How COULD he turn them out.', '2023-07-18', 8, 3, '欢', '华', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(20, 'eyJpdiI6IktyQnZxQmg1aXlBQWJyL01XWjhHWXc9PSIsInZhbHVlIjoiajE4MXF2cHo0b1ArYXp6RnZsNE5jQT09IiwibWFjIjoiMzY1YTU5ODA5ZTIwODU1NTQ3ZTUxZGQ4MTlhZTlhZTRmZTI4OWNhYmEyNmUwYmJhMDJjMjliMzM1NWQwYWM2ZSIsInRhZyI6IiJ9', 11, 4, 2, 4, 307, 2324, NULL, 'aliyun', 2, NULL, 'Alice said to herself. (Alice had no reason to be talking in a tone of the e--e--evening, Beautiful, beautiful Soup! Soup of the others took the place of the hall; but, alas! the little golden key.', '2023-07-18', 11, 1, '莉', '关', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(21, 'eyJpdiI6ImdRa2VYSjZJVGpuNTlBU1czT29GN2c9PSIsInZhbHVlIjoiRlB1Y1RFRTI3U1Y5TWRPa1F5MlNJdz09IiwibWFjIjoiZDQ5Y2U1ZDNhZGQ2YmMyZDgxZWM0Y2NmMTUxN2M4ODdiZGUyNDEwZTEwM2JiZGFhODM0YzUwNTliYTg5M2M4NyIsInRhZyI6IiJ9', 1, 1, 1, 4, 6827, 3466, NULL, 'aliyun', 2, NULL, 'Dormouse shall!\' they both bowed low, and their slates and pencils had been to her, still it was a sound of a muchness\"--did you ever saw. How she longed to change them--\' when she had got its head.', '2023-07-18', 17, 2, '文彬', '边', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(22, 'eyJpdiI6IjU3RDRSMkI1YTZYWHdUUGx3elFKb2c9PSIsInZhbHVlIjoiTzdMS214aXY4SXl2TldTYktsNldlUT09IiwibWFjIjoiMjMyZDI2NjVkMTllNWNkN2UwY2NlNzQzZDNlODRmZGM4ZjNkNmZjZjFiMzNhMmYwYjRiNjA3Yzc2NDg4MmU3NiIsInRhZyI6IiJ9', 3, 4, 2, 2, 263, 4970, NULL, 'wechat', 3, NULL, 'Alice replied eagerly, for she felt that this could not taste theirs, and the fall was over. Alice was beginning very angrily, but the wise little Alice and all would change to dull reality--the.', '2023-07-18', 10, 5, '楠', '明', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(23, 'eyJpdiI6ImNKbk56WEZBd0gxRW91Z0RIa2hkM0E9PSIsInZhbHVlIjoiU3grOGoxMVk0WFJXS0tHUVg4TEdYUT09IiwibWFjIjoiMThkOGU1NTc2M2Q4MDhmNTM0MjIyNGU1YzA0MWMyODEzMjFkYzg3MDRiZmZlY2Y1OWY0OTBlNzQ0YzMwODYyZiIsInRhZyI6IiJ9', 3, 4, 1, 3, 2459, 4133, NULL, 'aliyun', 3, NULL, 'Alice considered a little, \'From the Queen. \'Never!\' said the Gryphon. \'It all came different!\' Alice replied eagerly, for she had never done such a curious croquet-ground in her life, and had to.', '2023-07-18', 3, 4, '瑜', '蒋', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(24, 'eyJpdiI6IlRKekxqUGwxZHhUSWtkZHdENCtadVE9PSIsInZhbHVlIjoiR3diTkVCRDZmWXBOVzdtdHZUSCtGZz09IiwibWFjIjoiZGJmNTA5N2U4MDI2MDk0MzUwZDI4ZTE3OTk0ZmQ4YjhlNjA5NDAzNjNkNmFmNzZjMWJmOTQ5ZDIwMzRmZTEwZCIsInRhZyI6IiJ9', 3, 4, 2, 5, 6333, 3622, NULL, 'aliyun', 1, NULL, 'ARE OLD, FATHER WILLIAM,\"\' said the Gryphon, before Alice could speak again. The Mock Turtle\'s Story \'You can\'t think how glad I am very tired of this. I vote the young Crab, a little three-legged.', '2023-07-18', 7, 3, '明霞', '欧阳', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(25, 'eyJpdiI6Im1oV0NESkRvVFl4TkRpWkVuOUxhU3c9PSIsInZhbHVlIjoiRUxOeFc2KzhsMEVPNDlqMXJQTjEvUT09IiwibWFjIjoiNjM1M2ZjNzYyMWMyOGI3ZmUwMzdmYzcyNjI1MDcxNzFlMjIzOGQwZGJiZTdlODU2NzBmOTU4YWZkOTc0NTM1ZCIsInRhZyI6IiJ9', 9, 2, 1, 5, 8737, 2878, NULL, 'wechat', 3, NULL, 'Majesty,\' said Alice angrily. \'It wasn\'t very civil of you to offer it,\' said the Lory. Alice replied in an offended tone, and added with a yelp of delight, and rushed at the sides of the busy.', '2023-07-18', 17, 2, '雷', '邸', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(26, 'eyJpdiI6IkJZdUErbzJDQTBjQ09wRHdiaFVrV1E9PSIsInZhbHVlIjoiMEtIZUtTK2g5VkRvSHdLRE9jNFR5UT09IiwibWFjIjoiNmU3MGEzNzc3OWZhOWQ0Y2E4YzllYzZkNDk4MjEyZDUwYjAwYjg1N2I5NjQzNDNhMTg4NDNmZjU2OTAyNmMwYyIsInRhZyI6IiJ9', 6, 3, 1, 5, 8445, 5679, NULL, 'aliyun', 1, NULL, 'Rabbit was still in existence; \'and now for the Duchess sneezed occasionally; and as the large birds complained that they could not think of anything else. CHAPTER V. Advice from a bottle marked.', '2023-07-18', 10, 3, '桂香', '路', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(27, 'eyJpdiI6ImtOZUFSL0dXZHdQNnVNTzZRUmc5OUE9PSIsInZhbHVlIjoiQzJWbERQL3hDUlovbHJYcWI0c2R1Zz09IiwibWFjIjoiZDA0ZmZkYWZlNGMyMDQ1MDM4YWJiMjU3OTI5MjI0NDcwYmU3ZTc4YmM2MDlkZGE0MDlkM2RiYzMxYTRkODNlNSIsInRhZyI6IiJ9', 5, 4, 2, 1, 2250, 7661, NULL, 'aliyun', 2, NULL, 'Mouse, turning to the game. CHAPTER IX. The Mock Turtle had just begun to think about stopping herself before she got to the jury, in a large pigeon had flown into her head. Still she went on to.', '2023-07-18', 23, 4, '兵', '田', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(28, 'eyJpdiI6ImQ2YmcwbS9lcHY3YWJLdFZNVDVxN0E9PSIsInZhbHVlIjoiMWhhUkVpU1I1cDRtWjYyK3JIbGlOZz09IiwibWFjIjoiZTliZmRhZDZkNTRhOTUyODUxNzRhYWM1YmFlMGY0M2FjMWMzODA3ZjZhNDYyNjNjMmFkYzdlNWY2MGUxZmI2ZCIsInRhZyI6IiJ9', 11, 1, 2, 3, 4, 584, NULL, 'wechat', 1, NULL, 'King, and the moon, and memory, and muchness--you know you say things are \"much of a tree. By the time she had made out that it had VERY long claws and a pair of white kid gloves, and was.', '2023-07-18', 16, 2, '娜', '毛', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(29, 'eyJpdiI6Ik1hazRxR0prM2puMktVVFlZMUthYVE9PSIsInZhbHVlIjoiYVMrdTRNVDFDQm8xaG52VWhIZ1VGZz09IiwibWFjIjoiYzZhODdkZmFjMTk1NzViYTc3ZmI0YjczOWYwYjk2ZGQ3YTBjYjlmNmVhODA2NmViYTgzNDBjN2Q3NzEwNDc3NiIsInRhZyI6IiJ9', 15, 2, 2, 5, 8708, 2006, NULL, 'aliyun', 3, NULL, 'Majesty!\' the soldiers shouted in reply. \'That\'s right!\' shouted the Gryphon, and, taking Alice by the Hatter, and, just as she could not help bursting out laughing: and when she next peeped out the.', '2023-07-18', 16, 3, '龙', '陈', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(30, 'eyJpdiI6Ik1GaitkTTdOY3Y4ejArQ2wxdHFCQWc9PSIsInZhbHVlIjoiSzJodXRSYzNCRjRvK1Q5bzR0dWtmQT09IiwibWFjIjoiY2I0NWNlYmZkNjU4MmMxZjEwM2E2ZWYxZTQ5NmMzYzdhNzYyNjcxNjRhNzEzNTg1YWIzYTZjMjcxZTE5NGFmYiIsInRhZyI6IiJ9', 14, 1, 1, 2, 6293, 888, NULL, 'aliyun', 2, NULL, 'Caterpillar took the hookah into its eyes were nearly out of a tree a few minutes it puffed away without speaking, but at last she spread out her hand, watching the setting sun, and thinking of.', '2023-07-18', 15, 3, '建军', '畅', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(31, 'eyJpdiI6IkM0L1RNdkh1elQrcldkU0FHNUVBM0E9PSIsInZhbHVlIjoiRjRGUXlPZklvaGZCZno4WkF4c3M3Zz09IiwibWFjIjoiMDBkODFmMGJlM2NhZmU0N2NhNjJlZDhhZGVjOTQ4MzE2NzM2MjdkMjczYTgwMmYxNTFhOTNlYjk0NDI4Yjg4NiIsInRhZyI6IiJ9', 4, 1, 2, 3, 3777, 287, NULL, 'aliyun', 1, NULL, 'Gryphon; and then nodded. \'It\'s no business there, at any rate: go and get ready for your interesting story,\' but she did not dare to laugh; and, as a partner!\' cried the Mock Turtle replied in an.', '2023-07-18', 19, 1, '昱然', '宇', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(32, 'eyJpdiI6ImxVMVA0WU1pTEJjYmJUOE1jOWUyVHc9PSIsInZhbHVlIjoienNtSld4aEtEUHR3SUEvb1IxWTg4Zz09IiwibWFjIjoiN2RkZWJkMTA4MDNjZTE4MzE4YTEwZTNjMjlkYjBlZWVkNDQwMjE2OWMzZGRmYmRhNzM3Y2Q4MjFkNTk0MzdhNiIsInRhZyI6IiJ9', 4, 5, 2, 3, 1628, 2157, NULL, 'aliyun', 1, NULL, 'For anything tougher than suet; Yet you turned a back-somersault in at all?\' said Alice, (she had grown in the newspapers, at the house, quite forgetting her promise. \'Treacle,\' said a whiting.', '2023-07-18', 4, 5, '鹏', '饶', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, '2023-07-18 11:49:05'),
(33, 'eyJpdiI6InVwa29reEJROGRURmY4RHJweHAvb0E9PSIsInZhbHVlIjoiQkNiSHJHMFZ4V3dYNFdaQk9HbEtjUT09IiwibWFjIjoiMGEzYWEwM2Y3YjI3YWEwYTU3MWYzYWNkMGRjZTNkZmQxZTVmMjk4NTY5NzBhMDYzZGE2NGY3ZTZlMTFmZjA0NCIsInRhZyI6IiJ9', 5, 5, 1, 5, 5172, 9957, NULL, 'wechat', 3, NULL, 'Alice replied eagerly, for she had found the fan and gloves--that is, if I like being that person, I\'ll come up: if not, I\'ll stay down here! It\'ll be no sort of use in the air. Even the Duchess.', '2023-07-18', 5, 5, '正平', '练', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(34, 'eyJpdiI6IkFEM2l5MnhXQUFubWV2V0pZdy9Kanc9PSIsInZhbHVlIjoiVUpwSkRjNlp1K245L0lFRVJyazJnQT09IiwibWFjIjoiYzliNDA2ZTNkNThiZTRhZWZlYWJjOTE4MmYwMGIyMDk2OTVkNjAyZjEyYjk4OTZiOTM4NDQ3ZmJlZDQ5NzViMyIsInRhZyI6IiJ9', 15, 4, 1, 4, 7230, 6508, NULL, 'aliyun', 1, NULL, 'Bill\'s place for a conversation. \'You don\'t know what to say \'I once tasted--\' but checked herself hastily. \'I thought you did,\' said the Gryphon: \'I went to school every day--\' \'I\'VE been to a.', '2023-07-18', 11, 4, '金凤', '祁', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(35, 'eyJpdiI6IndPbmJYUnpHc2QzQk9DVnhZM2cxMGc9PSIsInZhbHVlIjoiczJ0dnprQlAvUkczNE1USENZVlVkQT09IiwibWFjIjoiN2FmMzk1ODY4NTcwZjljNzY1YjUyODlhZTdmZDYzYmRjOWQxODQyYjI0N2EyMTQ3YWU0NTI4NTI1Mzk1ZGI0MSIsInRhZyI6IiJ9', 14, 4, 2, 1, 7922, 8160, NULL, 'wechat', 3, NULL, 'Duchess; \'I never could abide figures!\' And with that she was not quite like the Mock Turtle, and said \'What else had you to sit down without being seen, when she first saw the White Rabbit. She was.', '2023-07-18', 20, 2, '桂花', '甘', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(36, 'eyJpdiI6Im5VTTh6UlVGR1lianplSVZ1cTBScUE9PSIsInZhbHVlIjoiVlhOMzFJdmF1cjRlUEJqRHNLU1JlUT09IiwibWFjIjoiMWFjMzUzOTlhODY4MGM0ZTIwY2YxNDc5NmNlZDcwZGIzNTI3YmRlNjdlODI0NjkxNTIzZDdiZDVhNzkwNGI5MyIsInRhZyI6IiJ9', 10, 4, 1, 3, 6359, 9954, NULL, 'aliyun', 2, NULL, 'Gryphon. \'The reason is,\' said the King, rubbing his hands; \'so now let the Dormouse into the wood. \'If it had grown in the shade: however, the moment how large she had not gone (We know it to speak.', '2023-07-18', 22, 1, '建军', '欧', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(37, 'eyJpdiI6InptcVQyQVdWZEVCNmpDWnhuSUdqL0E9PSIsInZhbHVlIjoiT0c1ZGh0THNJOERhUWhDREp6U1ZoQT09IiwibWFjIjoiZjM5NWQ0ZjA2NDlkZjIzM2M1YTIyZDc4YzAyZTE1Njg3YjYyZjdmZTAxZjVhYmNjMTkxMzVhZDA2MTg1ZGI5MiIsInRhZyI6IiJ9', 3, 3, 2, 2, 8631, 7827, NULL, 'wechat', 2, NULL, 'Queen, and Alice guessed who it was, and, as they used to come out among the people near the centre of the conversation. Alice felt so desperate that she had wept when she noticed a curious.', '2023-07-18', 22, 5, '瑜', '廉', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(38, 'eyJpdiI6IkNTZ0x5RXVsdndvTjBBblQzZGlPTmc9PSIsInZhbHVlIjoiV1VEMkFRUTEwd3RkOFk1KytCdHU3dz09IiwibWFjIjoiOWQ5ODY3MzY5NzFiMWUxODQzMTE1ZTlkMzkxOWU0ZmE5NzA3YzU4NDg4MDU0ZDBiMjExZWViMTJkMzQzNDBiZiIsInRhZyI6IiJ9', 9, 2, 2, 5, 9634, 8921, NULL, 'wechat', 2, NULL, 'Gryphon answered, very nearly carried it off. \'If everybody minded their own business!\' \'Ah, well! It means much the most curious thing I ever saw one that size? Why, it fills the whole thing very.', '2023-07-18', 5, 2, '鹏程', '冷', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, '2023-07-18 11:49:03'),
(39, 'eyJpdiI6IjZkK1habXFXdS9LM2l2Y08zdTd4SVE9PSIsInZhbHVlIjoieVcwNGJINXcwcFFjTFA5ZGN1cFlRZz09IiwibWFjIjoiMTI3ZDNkYjUzNWJiNzZjNmE0YWU0NjlmM2E0MDg3NTc4ZjQ4M2Y2MTc5ZmYzZTZlMWFjY2E4NTE4MTNiYTkyOCIsInRhZyI6IiJ9', 13, 5, 1, 1, 6732, 421, NULL, 'aliyun', 1, NULL, 'Alice, as the March Hare, who had been looking over their heads. She felt very curious to see how he can EVEN finish, if he wasn\'t going to begin again, it was a dead silence. \'It\'s a mineral, I.', '2023-07-18', 5, 5, '志强', '古', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(40, 'eyJpdiI6Im9GSTBsYTdxSE5ZZlA1WUVoelNxQkE9PSIsInZhbHVlIjoidDBaTWZKSVM2ODMySXhSLzBuOVVOQT09IiwibWFjIjoiMThkY2ZjZjNjMWRlMDc2NDExMmEzZGNjMDM5OTBmOWJlNGU1NzdkNzc4MzMzZjM5NjJkZTI5ZDFlM2E3Y2M0ZSIsInRhZyI6IiJ9', 9, 3, 1, 2, 7197, 3717, NULL, 'aliyun', 3, NULL, 'Queen, who was sitting next to no toys to play croquet.\' The Frog-Footman repeated, in the sea!\' cried the Mouse, who was peeping anxiously into its face to see it trot away quietly into the air.', '2023-07-18', 4, 2, '志新', '梁', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(41, 'eyJpdiI6Ilk1VDA2d1NjOW5UNHFDQVJ3cjBBaFE9PSIsInZhbHVlIjoiR1Ewb1lSd3hIL3AwOTZjVW8wTjBvUT09IiwibWFjIjoiMGQ2OTQ3MzUwY2U1YTY2NTgwNjJjYzk4YjhiYzljNmJhODA2NzQ5M2YyNjFhNDYwMWRjOTM3MzA4ODk1MTgxYyIsInRhZyI6IiJ9', 3, 3, 2, 2, 8242, 1894, NULL, 'wechat', 3, NULL, 'Hatter instead!\' CHAPTER VII. A Mad Tea-Party There was a table, with a trumpet in one hand, and made another rush at the end of half an hour or so there were TWO little shrieks, and more sounds of.', '2023-07-18', 3, 3, '桂芝', '季', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(42, 'eyJpdiI6IjZ4ckhRdy9hUGVRVlF5VElIWW1PbUE9PSIsInZhbHVlIjoiYlM3MDllYzRRZnFqUEtocGwvWXd0Zz09IiwibWFjIjoiYmU4ZGM4OWZlYTViYzc5YzI3NTU3ZTFlYjRmNDViNTE5NmY0Yzg1ZTJmZTQ1NjY0MTZmMWIzZjNkYzQzNDA1ZiIsInRhZyI6IiJ9', 13, 2, 1, 5, 1476, 9223, NULL, 'aliyun', 1, NULL, 'King eagerly, and he says it\'s so useful, it\'s worth a hundred pounds! He says it kills all the things between whiles.\' \'Then you shouldn\'t talk,\' said the Caterpillar. \'I\'m afraid I am, sir,\' said.', '2023-07-18', 8, 5, '亮', '卜', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, '2023-07-18 11:49:02'),
(43, 'eyJpdiI6ImY1bk1hV2p1OUd2by9hN21TbWdEc2c9PSIsInZhbHVlIjoiUTFMWCt3aU9EVmM4VmQzeU9TZmt5QT09IiwibWFjIjoiMDgzNThjZWNlMWFmMTFiZDljMDQ1OTI3YmZjMTRhYWUyNWEzYTFhOWQxMzFjYjQwZGI4ZWVhYjYyZGM4MjBkMyIsInRhZyI6IiJ9', 8, 5, 1, 3, 2950, 5233, NULL, 'aliyun', 3, NULL, 'Mock Turtle replied in an angry tone, \'Why, Mary Ann, what ARE you talking to?\' said the Mock Turtle, suddenly dropping his voice; and Alice was very glad to find that she hardly knew what she was.', '2023-07-18', 21, 4, '雷', '伏', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(44, 'eyJpdiI6IlZLbUxia1AwNWt4MXlCeDFQUEJZVlE9PSIsInZhbHVlIjoiRVR2dWpBb1AwTmR4aGRISUthZG9HQT09IiwibWFjIjoiYzMwN2NiMWNmNTk4MzhmNDQ2YzUxNzQ0NzRjMDI4NDA5NDhjOTAwYzA2ZDQ5OTNkZDVjMjQ3NWU5ZTdmNDJjOCIsInRhZyI6IiJ9', 6, 2, 1, 2, 1222, 2283, NULL, 'aliyun', 3, NULL, 'Then she went hunting about, and called out to sea as you go to law: I will tell you more than that, if you wouldn\'t keep appearing and vanishing so suddenly: you make one quite giddy.\' \'All right,\'.', '2023-07-18', 21, 2, '磊', '殷', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, '2023-07-18 11:49:01'),
(45, 'eyJpdiI6IjdZZWxBWSs1NUUxVW1kY2tSNVRQUFE9PSIsInZhbHVlIjoicFlicU9xMWhWdm14WEoyQ3JkbjVqdz09IiwibWFjIjoiODIzNTJmZjBjZTk4Y2Q0YzY4ZjAyZWI1N2I3Y2MxODA4M2E4ZTJhZmU4Nzc0M2QwOTc2Yzk3OWMwNDhjMDFmYyIsInRhZyI6IiJ9', 8, 5, 1, 1, 9184, 3073, NULL, 'wechat', 3, NULL, 'Alice to herself, \'I wonder what they said. The executioner\'s argument was, that she had not long to doubt, for the next witness was the Hatter. \'Does YOUR watch tell you how it was too dark to see.', '2023-07-18', 5, 3, '楠', '俞', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(46, 'eyJpdiI6ImZTcmczRFVRRXNzMkM4Z2xBY21RL2c9PSIsInZhbHVlIjoiU2Y3MDdYNkNZOXFjTHVUL3dVcHQ3QT09IiwibWFjIjoiNmY5Y2Y4YWRmNGJmMmU4MmNkZjQyNzYyMmNiNzdiYzFmYjI2OTI0NGE4YTRhZjYxMTg3MzAwODM1Y2U4Mzc2ZCIsInRhZyI6IiJ9', 9, 3, 2, 5, 8978, 643, NULL, 'aliyun', 1, NULL, 'Gryphon, and the fan, and skurried away into the sky all the things between whiles.\' \'Then you keep moving round, I suppose?\' \'Yes,\' said Alice, who felt very lonely and low-spirited. In a minute or.', '2023-07-18', 2, 4, '捷', '高', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(47, 'eyJpdiI6IlBIdy9pUXFzRUJwSkh4c3R2S3ZoSnc9PSIsInZhbHVlIjoiTzF1Vi9YL251MFJkZS9zQUZOSFgxQT09IiwibWFjIjoiMzU5YTMzOTJlMTI2NTNhMGFiODFlY2JiN2IzZmU1OTlmZDE5M2Q3ODdjMTFmZTZmNmVjYzA0N2I3MGUxZGY0MiIsInRhZyI6IiJ9', 5, 5, 1, 2, 1327, 276, NULL, 'aliyun', 3, NULL, 'And mentioned me to sell you a couple?\' \'You are not the smallest notice of them say, \'Look out now, Five! Don\'t go splashing paint over me like that!\' But she waited for some time with one eye; but.', '2023-07-18', 14, 3, '秀兰', '鲍', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(48, 'eyJpdiI6ImUvMnhmdFdjVEZCQmJpSkJKbUViQlE9PSIsInZhbHVlIjoiMHkwdXFnQ3l2bFZOKzNPVDVab1RaQT09IiwibWFjIjoiNGQzN2UyOWM3MTAxMTRiMzcyNDIyNjliMzFlZGM4OWZhMWUyMGZjZjM4MjdhYmY4NjFkMjRlOThjMDg5OTY0NyIsInRhZyI6IiJ9', 14, 4, 1, 5, 2656, 5471, NULL, 'wechat', 1, NULL, 'Lobster Quadrille The Mock Turtle in a tone of this ointment--one shilling the box-- Allow me to sell you a song?\' \'Oh, a song, please, if the Queen was to get dry very soon. \'Ahem!\' said the.', '2023-07-18', 22, 3, '芳', '鞠', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(49, 'eyJpdiI6Indpc05vV053RTQrVmI4cEhQYlNnVGc9PSIsInZhbHVlIjoiQnM4WUF2YVdZY3NtMHZUYkhQZzlPZz09IiwibWFjIjoiZjU0MjVkODEzYjc1YjU3MDE3YzMxYWU1ODdmM2M2Zjg5YThkYzM4ZjViMjU4OWQ5ZDgwZmQwZDMzYTgxMzViMiIsInRhZyI6IiJ9', 5, 4, 1, 3, 3148, 9459, NULL, 'aliyun', 2, NULL, 'Queen\'s voice in the pictures of him), while the Mock Turtle said: \'advance twice, set to work, and very soon finished it off. * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * CHAPTER.', '2023-07-18', 15, 1, '爱华', '管', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL),
(50, 'eyJpdiI6InJyT2JOYlZIMEZQTlkyaUtvUnNLTmc9PSIsInZhbHVlIjoidFdrb0paTkFCajhRQk1sNVFiL2RBQT09IiwibWFjIjoiMWRkNTkwYWUzZDc4Nzc5NTdlNjM0NzY5NDQwMjQ3MGI2ZjU5NGVjOTNiNTFjNDM5ZTg2MmE1YjQwZmM2MmM4MiIsInRhZyI6IiJ9', 14, 5, 1, 1, 8812, 2342, NULL, 'aliyun', 3, NULL, 'Two. Two began in a low voice. \'Not at first, the two creatures, who had not a moment that it was the fan and gloves--that is, if I know all the other queer noises, would change to tinkling.', '2023-07-18', 22, 1, '鹰', '罗', NULL, NULL, '2023-07-18 07:07:32', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '主键',
  `sys_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '加密ID',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名字',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓氏',
  `appellation` int(11) DEFAULT NULL COMMENT '称谓',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '密码',
  `HKID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '香港身份证号',
  `date_of_birth` date DEFAULT NULL COMMENT '生日',
  `marital_status` int(11) DEFAULT NULL COMMENT '尚未明确',
  `mobile` bigint(20) DEFAULT NULL COMMENT '手机号',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '国籍',
  `area` int(11) DEFAULT NULL COMMENT '地區',
  `addres` text COLLATE utf8mb4_unicode_ci COMMENT '地址',
  `addressOne` text COLLATE utf8mb4_unicode_ci COMMENT '地址一行',
  `addressTwo` text COLLATE utf8mb4_unicode_ci COMMENT '地址第二行',
  `building` text COLLATE utf8mb4_unicode_ci COMMENT '座數',
  `floor` text COLLATE utf8mb4_unicode_ci COMMENT '楼层',
  `unit` text COLLATE utf8mb4_unicode_ci COMMENT '单位',
  `job_status` int(11) DEFAULT NULL COMMENT '工作状态',
  `salary` int(11) DEFAULT NULL COMMENT '薪水',
  `company_name` text COLLATE utf8mb4_unicode_ci COMMENT '公司名称',
  `company_contact` bigint(20) DEFAULT NULL COMMENT '公司电话',
  `company_addres` text COLLATE utf8mb4_unicode_ci COMMENT '公司地址',
  `create_datetime` datetime DEFAULT NULL COMMENT '创建时间',
  `update_datetime` datetime DEFAULT NULL COMMENT '更新时间',
  `last_login_datetime` datetime DEFAULT NULL COMMENT '上次登录时间',
  `update_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '被谁更新',
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '访问ip',
  `browser` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '浏览器',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '语言',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token',
  `device` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '设备',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 0=禁用,1=启用',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `clients`
--

INSERT INTO `clients` (`id`, `sys_id`, `first_name`, `last_name`, `appellation`, `password`, `HKID`, `date_of_birth`, `marital_status`, `mobile`, `email`, `nationality`, `area`, `addres`, `addressOne`, `addressTwo`, `building`, `floor`, `unit`, `job_status`, `salary`, `company_name`, `company_contact`, `company_addres`, `create_datetime`, `update_datetime`, `last_login_datetime`, `update_by`, `ip`, `browser`, `language`, `token`, `device`, `status`, `deleted_at`) VALUES
(1, 'eyJpdiI6IlJLQnJicWZJK0hmNXhYdG5Va2RDWVE9PSIsInZhbHVlIjoiSUxwWGp6NDdkK1gyQjZ0NEJNVy8rdz09IiwibWFjIjoiNjJkZmQyMmZiMGRkNmZhYzM3MDY3YzgzY2Y0NDBhMGI5Mzg3MGRkYTkyODY1MTY3ZDkxMTc1NjU1ZWFhMDViOSIsInRhZyI6IiJ9', '爱华', '池', 2, '7c4a8d09ca3762af61e59520943dc26494f8941b', '84333', '2011-03-20', 5, 13178935430, 'client@qq.com', '荷兰', 3, '石家庄经济开发新区', '合肥友好区', '拉萨高坪区', '21', '7', '0', 2, 8569, '时刻科技有限公司', 13187960246, '杭州白云区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', '2023-07-18 19:07:08', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(2, 'eyJpdiI6IllZYU8raXRZY1d6ck1qbC9CVXRKdkE9PSIsInZhbHVlIjoiTXI0b3ZoZWJxbTd0TE5lbEZCSWhyQT09IiwibWFjIjoiNGQ0OGUwMTM3YWRjMjY2N2ZmMzAzYmZkYjc3NjlhMzBmZTY3MTM1ZTE0NTAxMDQ4OWY5ZjljMjZjN2ZjYTIxMiIsInRhZyI6IiJ9', '玉兰', '瞿', 3, '7c4a8d09ca3762af61e59520943dc26494f8941b', '65476', '2005-08-14', 0, 15608799388, 'kconsequatur@hotmail.com', '白俄罗斯', 1, '杭州上街区', '南昌兴山区', '长春清河区', '28', '0', '8', 2, 4925, '彩虹传媒有限公司', 17618703572, '沈阳西夏区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(3, 'eyJpdiI6IkViMm1HRTB6K1dDQTlzV2E3cGtCZFE9PSIsInZhbHVlIjoiNTJLQXArbHcrUnVHTXlGNnZLMWJRQT09IiwibWFjIjoiNWNmOTEyN2YwMGQ5MTQ2NjVmYjQxMzg5MTRhYmU3NGJiMjdlMGVkZDUxNGQ5ZTUyNjFmYzRkMzM0NTZjOTc2MSIsInRhZyI6IiJ9', '玉兰', '饶', 3, '7c4a8d09ca3762af61e59520943dc26494f8941b', '59597', '1996-10-16', 3, 14766975886, 'at.quia@sohu.com', '帕劳', 2, '成都中原区', '合肥涪城区', '合肥城东区', '60', '9', '3', 1, 9870, '浙大万朋信息有限公司', 17057184960, '拉萨淄川区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(4, 'eyJpdiI6Ii91Y001NzFnOVcyVVd6VmV2TXE1ZlE9PSIsInZhbHVlIjoiYlM1bmVnL3VJeDhmenBRMHlIL3I4QT09IiwibWFjIjoiZGNjZGUzMzY4ODUxYmE1NjFmNzc4ZmFmMjI4MDQ2YzhjNDZhYWEwZWIwOTNmNjdkZjIwNmQ5ZDM3OGFiODkxZSIsInRhZyI6IiJ9', '捷', '单', 4, '7c4a8d09ca3762af61e59520943dc26494f8941b', '58999', '2017-09-04', 1, 17002492778, 'aspernatur.deleniti@hotmail.com', '马耳他', 1, '澳门淄川区', '合肥牧野区', '北京海港区', '30', '1', '4', 2, 2706, '七喜传媒有限公司', 17095644457, '香港高港区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(5, 'eyJpdiI6InB5R3R0b3ZreWc1SnBEVW5sZi9YMHc9PSIsInZhbHVlIjoiUWd3N1dCWmlxT0VVUzg5NWpTL1phQT09IiwibWFjIjoiM2Y3ODY3ZDlhNWRlOWFhYzM3MjE4N2VjZmUyZjc0NTVjNDIyOTRmODNhNjM4ZjgyYTE1Yzc4ZGUxNjMzY2Y0MCIsInRhZyI6IiJ9', '晨', '郭', 2, '7c4a8d09ca3762af61e59520943dc26494f8941b', '54588', '2004-04-05', 8, 18679624409, 'perspiciatis99@sina.com', '柬埔塞', 3, '广州高明区', '石家庄金平区', '银川中原区', '26', '6', '9', 2, 9735, '维涛科技有限公司', 13064799047, '乌鲁木齐怀柔区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(6, 'eyJpdiI6IkdnWlhkcW5vblI4bklQK0k1MTg5enc9PSIsInZhbHVlIjoickhMbWEveTFKbkw2aTdjTXpTMk5oZz09IiwibWFjIjoiN2ExNTI2OTQzZGM0MzlkNGY3NWEwZGMyMWMzM2NmYmJhODc2MGE0OGY2MjZkMzdjOGQyZWM3MzZiMTU0MTQ3NiIsInRhZyI6IiJ9', '秀华', '邸', 1, '7c4a8d09ca3762af61e59520943dc26494f8941b', '62922', '2018-12-18', 0, 13126971244, 'wquaerat@gmail.com', '比利时', 2, '广州萧山区', '拉萨浔阳区', '石家庄沈北新区', '92', '2', '5', 2, 9273, '同兴万点科技有限公司', 18916827883, '石家庄经济开发新区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(7, 'eyJpdiI6ImJ3WnVvT0Z2MTFZWS9VSWFHTklwQlE9PSIsInZhbHVlIjoiQ0QrYkI3dkJ5WS9Jdm9mYldiTkNUQT09IiwibWFjIjoiY2RiN2IwZDNjMTA4NTM0Yjk0ODE5YTEzNGFmM2U2Zjk2ZDkwNTI2NDhmM2VkZDdjMmMxZDJhZWM4ZmQ3ZWU0MCIsInRhZyI6IiJ9', '文娟', '蔺', 4, '7c4a8d09ca3762af61e59520943dc26494f8941b', '11934', '2009-12-27', 10, 15116143406, 'aut_molestiae@sina.com', '斯洛文尼亚', 3, '长春兴山区', '西宁涪城区', '西安中原区', '21', '5', '6', 2, 3662, '快讯科技有限公司', 17015850592, '呼和浩特新区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(8, 'eyJpdiI6IllFZ1BlVkpTcHg2eGZ5cWsvZlBjS1E9PSIsInZhbHVlIjoiYVRIbFJFUzlUeVltOElIL0oxSFVidz09IiwibWFjIjoiYmNjNWU0NjkyYmRlYmQ2MWY3MzZhZTJmMDIwYzU4Y2RlZDQ5MzQ2NDdhOTkxZjZiMGIxMDU0NTcwYmJkNjUyMiIsInRhZyI6IiJ9', '帆', '滕', 4, '7c4a8d09ca3762af61e59520943dc26494f8941b', '55472', '1994-07-21', 8, 13635922761, 'wut@sohu.com', '澳大利亚', 2, '澳门南长区', '西宁兴山区', '北京海陵区', '90', '0', '5', 1, 8696, '东方峻景传媒有限公司', 14565683604, '沈阳高港区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(9, 'eyJpdiI6IkZEaEhGWHV2K1VpOGpwMEN4aHJYL0E9PSIsInZhbHVlIjoiVmRpVjJxaC9mWUpOcVFXSmRkSjNodz09IiwibWFjIjoiYTI1NjJlN2YwMGM2Zjg2ODIzZDkzMTY0ZTE3M2RjZTc1NGExZDkxNGY0MGJjODc0MjNkYzM1ZDI2YWI4NGYzYyIsInRhZyI6IiJ9', '云', '敖', 1, '7c4a8d09ca3762af61e59520943dc26494f8941b', '44569', '2015-01-11', 1, 18186266719, 'mab@yahoo.com', '莱索托', 1, '南京永川区', '南宁兴山区', '澳门萧山区', '90', '5', '7', 2, 9527, '万迅电脑科技有限公司', 17088221368, '南昌西峰区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(10, 'eyJpdiI6InRneGNDZWgzZkhEUlFYaWRVMHVKdXc9PSIsInZhbHVlIjoiS0JQVVJaY3crdkpwYW1VemhEOE5JUT09IiwibWFjIjoiMTI3ZDU5MTIwMDYxNjUzMTU0NzcyNjZhOGY0YzM1ZjA2MDJhN2RiZDA1OTBiYWZiODRjN2RkNjY2ZWE5NDZiNCIsInRhZyI6IiJ9', '芬', '蓝', 3, '7c4a8d09ca3762af61e59520943dc26494f8941b', '82701', '2017-04-07', 7, 17092890300, 'pariatur.saepe@qq.com', '新喀里多尼亚群岛', 3, '合肥孝南区', '天津山亭区', '长沙龙潭区', '74', '9', '5', 1, 9984, '银嘉信息有限公司', 13657380208, '合肥清河区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(11, 'eyJpdiI6InFMcC8rMmZvb1hCS0lwUy9Ed3cxb1E9PSIsInZhbHVlIjoiRHpYZXF3ZFN3NTZxNjYySTNqYkJaUT09IiwibWFjIjoiZTExNDc5ZjExYjRiNGU5MjY4MzljNWQ4MTU1ZjgwYTk1MDBiNWE5NTNkNDYwNjEzNjA4Y2ExYWJmOGY0ZTc1MSIsInRhZyI6IiJ9', '涛', '董', 3, '7c4a8d09ca3762af61e59520943dc26494f8941b', '22682', '1988-09-29', 8, 17095913978, 'consequatur.quaerat@hotmail.com', '斯威士兰', 1, '兰州牧野区', '西安萧山区', '天津沙市区', '87', '0', '1', 1, 710, '九方网络有限公司', 17011854980, '银川海港区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(12, 'eyJpdiI6ImlEWENzdjNMYk1pL1ZXKy9PQTVzbmc9PSIsInZhbHVlIjoiektDaFp6SFJnTHAzMkJXMThnWFRYQT09IiwibWFjIjoiOTllYmE2MDdkOWYyMWQ3ZGM2YTkxNDZjZjZkM2JmNGExMDJhYjNlMTM5MDA1ZGM4Yzg1MmM3YmJlNTBjODlkMSIsInRhZyI6IiJ9', '芳', '邱', 2, '7c4a8d09ca3762af61e59520943dc26494f8941b', '35668', '1978-03-23', 5, 13122749031, 'harum_architecto@sohu.com', '几内亚', 3, '沈阳怀柔区', '济南山亭区', '香港沙湾区', '76', '6', '5', 2, 7632, '通际名联网络有限公司', 17749980517, '呼和浩特牧野区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(13, 'eyJpdiI6IlY0aFRqRDNGeCtkeVB2UHVRSDg3d2c9PSIsInZhbHVlIjoiK1JaMFRkVHAzUkg1Z09OZ0NyNitvZz09IiwibWFjIjoiMmIyYjBkMzIyZDk2NWUxOTgzNmNiYjYwN2NmYmEzM2ZkMjdhZDJkN2JkY2MyM2MwNjM3OWUxZDQ1NzBhNzE0OSIsInRhZyI6IiJ9', '玉梅', '邸', 1, '7c4a8d09ca3762af61e59520943dc26494f8941b', '46939', '1990-07-24', 7, 15998506873, 'inventore.quas@sina.com', '柬埔塞', 3, '广州翔安区', '哈尔滨东丽区', '太原沙湾区', '13', '3', '5', 2, 9338, '东方峻景信息有限公司', 14776465167, '沈阳魏都区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(14, 'eyJpdiI6IlA0UTBrL25xTzlKd2ZERWFzenJhMnc9PSIsInZhbHVlIjoiZGIvdjBxY1hRWnpPRjlkYlE5dmk0Zz09IiwibWFjIjoiOGJjNjk5OTc4NTg3YTk1OTYxMmU2ZTM4YTZlZDFiOGI2MmY3NmVlYzE3ZmQxYzFkY2E2NjQxNGIyY2QwZTlhZCIsInRhZyI6IiJ9', '博', '花', 2, '7c4a8d09ca3762af61e59520943dc26494f8941b', '64857', '2010-09-27', 6, 15373030111, 'cupiditate_recusandae@hotmail.com', '桑给巴尔', 3, '西安大东区', '银川怀柔区', '南京安次区', '79', '7', '8', 2, 7431, '飞海科技信息有限公司', 15135561070, '长春经济开发新区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(15, 'eyJpdiI6Ik03c01Td3ZjWjhvUjdyMjlETXpJbnc9PSIsInZhbHVlIjoib2tvNDZMM2o4cmhPOFd2dG9XYjBPUT09IiwibWFjIjoiMTJjMWY3N2VjZTMxNmE4MWIwNmUzNTcwMzc3YWE5NWM1ZDZhNTRlMzc3OWFiMDU3M2UwZjMyN2JkMjUxZTdmNSIsInRhZyI6IiJ9', '玉英', '涂', 4, '7c4a8d09ca3762af61e59520943dc26494f8941b', '82212', '1982-12-24', 1, 17817747803, 'velit.esse@126.com', '科克群岛', 2, '郑州花溪区', '兰州长寿区', '南昌华龙区', '31', '7', '4', 2, 9661, '济南亿次元科技有限公司', 13149933407, '石家庄淄川区', '2023-07-18 19:07:32', '2023-07-18 07:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  `last_login_datetime` datetime DEFAULT NULL,
  `ip` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `borswer_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `password`, `contact`, `create_datetime`, `update_datetime`, `last_login_datetime`, `ip`, `status`, `token`, `borswer_info`) VALUES
(1, 'xxxx hk', 'bamk@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '1234567', '2023-07-18 07:07:32', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL),
(2, 'HK bank', 'hkbamk@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '1234567', '2023-07-18 07:47:32', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `individuals`
--

CREATE TABLE `individuals` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键',
  `sys_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '加密id',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名字',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓氏',
  `mobile` bigint(20) DEFAULT NULL COMMENT '手机号',
  `contact` bigint(20) DEFAULT NULL COMMENT '联系方式',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '密码',
  `create_datetime` datetime DEFAULT NULL COMMENT '创建时间',
  `update_datetime` datetime DEFAULT NULL COMMENT '更新时间',
  `last_login_datetime` datetime DEFAULT NULL COMMENT '上次登录时间',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '语言',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token',
  `device` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '设备',
  `browser` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '浏览器',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 0=禁用,1=启用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `individuals`
--

INSERT INTO `individuals` (`id`, `sys_id`, `first_name`, `last_name`, `mobile`, `contact`, `email`, `password`, `create_datetime`, `update_datetime`, `last_login_datetime`, `language`, `token`, `device`, `browser`, `status`) VALUES
(1, 'eyJpdiI6InNRclpJeEhBUVBXREhJU1JHQXZiblE9PSIsInZhbHVlIjoiaERCdFdqRzB1eWsyL28wY0lEbUFHZz09IiwibWFjIjoiZDJhYjYxZDg1YjY1MjJkMGNlYmJkNDBkYjI1NDMxYjNiNjdiMDUxMDU5Nzg1NDJjMGI5NDhkZDMyMzQxZTM2YyIsInRhZyI6IiJ9', '宇', '刁', 13834068385, 15917605874, 'individual@qq.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, '2023-07-18 19:07:05', NULL, NULL, NULL, NULL, 1),
(2, 'eyJpdiI6Ik8vaFRhSzVaNlM1b0VObEFmU2RSSVE9PSIsInZhbHVlIjoicXR1R3F5U1BIRE9ROXhHREJ2STlxdz09IiwibWFjIjoiZDM4M2MwZTBlNjk5NDZmZjdkY2ZlN2UzNjgwZWI1NTkxYTcyMjkzNTZlMTY2ZDVjZWUzY2FhNjczZThlNGMxNCIsInRhZyI6IiJ9', '秀珍', '明', 18420905891, 17866190086, 'atque07@126.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'eyJpdiI6ImF3MG9nZVNyM3gwaHV1TzN3bFRNcVE9PSIsInZhbHVlIjoiWWJBVHVvWmlHekJhSklhNWd2dlVrQT09IiwibWFjIjoiYzNkM2YwOGM2ODRjNmQyYTNhZGExNTIzMTNmZWI0ZTU0YTI3MmFmZmMwY2QxNmYxMjVhMzAyZTk3ZWMyZmRkNSIsInRhZyI6IiJ9', '新华', '卓', 18587334706, 15392097925, 'rem_quibusdam@163.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'eyJpdiI6IjcreVZxRWp5QUZrQklUaWFIb3BLOXc9PSIsInZhbHVlIjoiTmdkaWNpa2tlYXU4Rkxlbko2UTlxQT09IiwibWFjIjoiMWRiNWU4YzIxNjI0MDIyOTBiMDY3ODM5YmFlOWUxNTQwMjg0OTlmMWI5MTQzN2RmYTU0MjVkYzJiM2VkNTk1MiIsInRhZyI6IiJ9', '学明', '车', 13083195501, 18799575582, 'dignissimos_et@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'eyJpdiI6IjViOTY3WmJjbzdhbll3VE93R2plRVE9PSIsInZhbHVlIjoibkpHa3JJZVRCc1B4Zms4KzRMeFhnZz09IiwibWFjIjoiODdhNTc1M2YzMjI2MDBmZGZkMmIyZThkN2FiNjEyYzY5N2NiZDdkMzU0OWI1MDI4ODZiZWU4YjUzMmJiYWE3MCIsInRhZyI6IiJ9', '嘉俊', '谌', 13454310690, 17002739529, 'sit.ex@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'eyJpdiI6Ikc3cVFnVytBaHhybzg5Vk90QWFaMmc9PSIsInZhbHVlIjoiY1BMUlUzak9HMExuK3I1T2tBZSsydz09IiwibWFjIjoiNzFiN2NiMDkxNjljMzNiY2YzZWMwZGU5YjhkNzMyODliMWM2NzYwNmVkZmUwZjYzMzQxY2RmNjRkM2IxNjkzOSIsInRhZyI6IiJ9', '岩', '路', 15127062148, 15815699764, 'vfacilis@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, 'eyJpdiI6Ijd6ZHpHTGlpdjQ4NjYrOG51MFZoaFE9PSIsInZhbHVlIjoiMXc3K2g1cHlrczlpdjQxUmRvYlBXQT09IiwibWFjIjoiNjcwNDZkOWFjYjhkNDE1NmEzMmIzNzViODIzYTkwYmRjMzQ1ZTU0MmVjZGIxMTNmMjA5MTM3ZTUwMjE1NGZjYiIsInRhZyI6IiJ9', '怡', '官', 17055881581, 18030141444, 'qui00@sohu.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 'eyJpdiI6ImpBcU9YakNycFhtcjlSTWt4T3AySmc9PSIsInZhbHVlIjoieUVWNFltSnFHRXBnNWtkc0x5anlIdz09IiwibWFjIjoiYmEzMjVmYjExM2E2MjNlNmNlZGY5MjU3NWE2YTNjN2Y0MzEwYWEwMjE5Yzc1MWU4OWVhMDBjYmFjM2YwMTg4MCIsInRhZyI6IiJ9', '慧', '稽', 17096580309, 15609030973, 'vitae.ut@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'eyJpdiI6Ik4xRTB4UmxFaUx6dDNmSFlQT2lISEE9PSIsInZhbHVlIjoiNU8yYzRYdlBkTWE0NldRK080eFMvQT09IiwibWFjIjoiYzBjZjFiN2I3YTI5NjFlY2RlNjUxNGJmMDAzODAwNzVjMGMxZmQzZmZiOGJkNjllYmY5NzljMWQ0OWEzZjdmNSIsInRhZyI6IiJ9', '英', '庄', 17837620039, 15334657188, 'cupiditate.soluta@126.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(10, 'eyJpdiI6InRkNUtGekdWeFZKVUhVajZ6c0hjOWc9PSIsInZhbHVlIjoiSjJOeHRqN01SN0wwMy8wbE9sMW9vZz09IiwibWFjIjoiMjhiZGNhNjJiZTYzMmM5ZmMxZGQ0Yjg1N2Y2MGNkZjQ5MjVkMjdkM2RiOTRkZDJkMzY2OTA1MjIxZDJhMTE4NiIsInRhZyI6IiJ9', '志新', '倪', 15563654429, 18778141605, 'uiste@163.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, 'eyJpdiI6ImhXOEdibjEybUR6NmdDRzJscURDYkE9PSIsInZhbHVlIjoiVUlkQzVZakg3RThENHJYYUJkU1REUT09IiwibWFjIjoiN2E3NWFjZDNiOWFlYTJkOWYwYzcyY2VkY2ViZjU1ODlkMmVjNzFiMjcxYmYzMDAzZWM5MjIyOTUwY2ZiOTczNCIsInRhZyI6IiJ9', '艳', '查', 17093109677, 18268058480, 'eaque24@qq.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, 'eyJpdiI6Ik95S2JOSS9iS2EzbjRVejlkR21ndXc9PSIsInZhbHVlIjoiSjFoS3BUZHBDL1F4ZVBMMzI3V1RzZz09IiwibWFjIjoiYzJmNmM3YzRjZTMwOGM1M2RmMzYxYWMwN2YzNTM2ZDY5OTI3MDFiOWVhNWMyNWQ5NDI5NjMyMjM2NTIxNGIyMSIsInRhZyI6IiJ9', '琴', '仇', 15241713426, 13655491258, 'qui.ipsa@126.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, 'eyJpdiI6Ilg4aGJEa2VXem4xbHJ5emZtcHBnSmc9PSIsInZhbHVlIjoiMDhBc1g1WDhsQ0kwMXdIcDdmTEZWQT09IiwibWFjIjoiZDdiYjhmMDU1NzNhY2UxMjVlZjc0OGEzZmUwOTJmMjExNmY5MmNhNWY5NzA4NzY5ZTY2YmY1YzhlMTFkNTI2ZCIsInRhZyI6IiJ9', '凯', '耿', 13050480333, 13577669349, 'velit_ea@163.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(14, 'eyJpdiI6ImhleEpVMGM1VXg2WFdld1FGWFZaeGc9PSIsInZhbHVlIjoiaTBMMC9WUUNJbnJIbndHbWkwUWZnUT09IiwibWFjIjoiN2ZmODFiNjk1YWI2ZWRmZTViN2IyMjYwODcwZGNlZTliMjVlNDQwOWU5OTBlMGIyODM3ZTljODA0NzFhNTI0MiIsInRhZyI6IiJ9', '淑英', '庞', 17660250856, 13424461441, 'magnam.laudantium@sina.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, 'eyJpdiI6IjlzTnFlcDYwMFZYSEFnZ1M2WUtYZWc9PSIsInZhbHVlIjoibEROVlpnRURtMUNHdWdpeGxMQlViUT09IiwibWFjIjoiNzkwOWZhNjA4ZmRkODQzNmY0MzJlNmUxZjliODBlZTgyOTM4NGVlNmU5NjU3MGRhMmJkYjQzYjI4NDI0MGI1YSIsInRhZyI6IiJ9', '桂香', '范', 18431973621, 15534257350, 'voluptatem_in@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(16, 'eyJpdiI6Ikk4MURHNkUzWVk5MFZYZ0NKVUk1ZVE9PSIsInZhbHVlIjoiNzY1K0xEbUJYMjdmM3UreXo3S2cyQT09IiwibWFjIjoiOGMzNTY3NjYwYjk0NTc5ZDk0NWRkYjI0MjY4MjYwNjM4MTQ3MGUwNDNiMWZkZTEyYWRlOWNkMTRkOTJlYTg4YyIsInRhZyI6IiJ9', '丽娟', '练', 18490358873, 13127564469, 'ipsa_veniam@sina.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(17, 'eyJpdiI6ImRjdG5UclZvWmg3VVM3Zm51WFJzSEE9PSIsInZhbHVlIjoiN2FXNHRRek5aZFVvSUw5czJHQnRIZz09IiwibWFjIjoiMTAzM2Y1YTE4Nzk2YThjNmZlMzQ1MGU0ZDQxNTNlNmY3ZDg5YTNmNjRlOWQ4ZWJkNmQ4NmUyN2E4ZDk5MWEyMSIsInRhZyI6IiJ9', '佳', '成', 18230382443, 17154740485, 'qui.explicabo@qq.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(18, 'eyJpdiI6IlBnYklQMjhhSS9xY09Fa20zUWEyQUE9PSIsInZhbHVlIjoiU0pkaGhKVmlJUWxsWGhNaGU0dncyQT09IiwibWFjIjoiNWU3ZjVmM2RmODg0YjUxNjdiY2UxZjdiNjA4YjkwMGZjMjc0MjA1NWE0ODVjYzUwOWQ2MjgyZjIyNzFlNzlmZiIsInRhZyI6IiJ9', '玉华', '官', 15545236732, 17076945693, 'rem_non@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(19, 'eyJpdiI6Ik1COWMzUTNwdU9qODBzMS9Pa2g0VEE9PSIsInZhbHVlIjoiemtvMXJyaDZqRURIcUgwNFBUb0NCUT09IiwibWFjIjoiYzljNTBhOGVjMDVmYTJlYmMyNWJkZGY5NzUxMmIyMzY0Nzg3NzMwMWI4MTIwOGJmODk0NGYxOGRhYzMwMWQ5NCIsInRhZyI6IiJ9', '桂兰', '祝', 15641173687, 13655984777, 'nisi_architecto@126.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(20, 'eyJpdiI6ImZuTEZHTExRODN0ZFNGYUprZWNNbnc9PSIsInZhbHVlIjoibmNKUWxZQU1kOVhzKzFubFRHcFE0QT09IiwibWFjIjoiM2Q5ZDhkMzg5YTBjZDJjMGQxYWZjOTYxZjY3MzNkMWY3YzdlNjJlMDA4MWY0YTYzZWYyOGY3M2E5YzExZTY5YiIsInRhZyI6IiJ9', '桂芬', '房', 18889851579, 15060989566, 'ut_tenetur@sohu.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2023-07-18 07:07:32', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lbo_appellations`
--

CREATE TABLE `lbo_appellations` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_tc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `lbo_appellations`
--

INSERT INTO `lbo_appellations` (`id`, `label_tc`, `label_en`, `status`, `value`) VALUES
(1, '小姐', 'Miss', 1, 'Miss'),
(2, '女士', 'Ms.', 1, 'Mis.'),
(3, '先生', 'Mr.', 1, 'Mr.'),
(4, '太太', 'Mrs.', 1, 'Mrs.');

-- --------------------------------------------------------

--
-- 表的结构 `lbo_case_statuses`
--

CREATE TABLE `lbo_case_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `shortt_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_tc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `lbo_case_statuses`
--

INSERT INTO `lbo_case_statuses` (`id`, `shortt_code`, `label_tc`, `label_en`, `status`, `remark`) VALUES
(1, 'submitted', '提交', 'submitted', 1, NULL),
(2, 'pass_to_sp', '轉交到服務提供者', 'pass_to_sp', 1, NULL),
(3, 'approved_by_sp', '服務提供者同意', 'approved_by_sp', 1, NULL),
(4, 'success', '申請成功', 'success', 1, NULL),
(5, 'fail', '申請失敗', 'fail', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `lbo_devices`
--

CREATE TABLE `lbo_devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `shortt_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `lbo_devices`
--

INSERT INTO `lbo_devices` (`id`, `shortt_code`, `status`) VALUES
(1, 'IOS', 1),
(2, 'AOS', 1);

-- --------------------------------------------------------

--
-- 表的结构 `lbo_districts`
--

CREATE TABLE `lbo_districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_tc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `lbo_districts`
--

INSERT INTO `lbo_districts` (`id`, `label_tc`, `label_en`, `status`, `value`) VALUES
(1, '港島', 'Hong Kong Island', 1, 'Hong Kong Island'),
(2, '九龍', 'Kowloon', 1, 'Kowloon'),
(3, '新界', 'New Territories', 1, 'New Territories');

-- --------------------------------------------------------

--
-- 表的结构 `lbo_employments`
--

CREATE TABLE `lbo_employments` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_tc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `lbo_employments`
--

INSERT INTO `lbo_employments` (`id`, `label_tc`, `label_en`, `status`) VALUES
(1, '受雇', 'employed', 1),
(2, '自雇', 'Self employed', 1);

-- --------------------------------------------------------

--
-- 表的结构 `lbo_genders`
--

CREATE TABLE `lbo_genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_tc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `lbo_genders`
--

INSERT INTO `lbo_genders` (`id`, `label_tc`, `label_en`, `status`) VALUES
(1, '男', 'man', 1),
(2, '女', 'women', 1);

-- --------------------------------------------------------

--
-- 表的结构 `lbo_loan_purposes`
--

CREATE TABLE `lbo_loan_purposes` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_tc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '中文名称',
  `label_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '英文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `lbo_loan_purposes`
--

INSERT INTO `lbo_loan_purposes` (`id`, `label_tc`, `label_en`, `status`) VALUES
(1, '一般個人開支', 'General personal expenditure', 1),
(2, '裝修', 'Decoration', 1),
(3, '進修', 'Further education', 1);

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(926, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(927, '2023_03_24_201402_clients', 1),
(928, '2023_03_25_100600_individual', 1),
(929, '2023_03_25_103556_lbo_gender', 1),
(930, '2023_03_26_205304_create_cases_table', 1),
(931, '2023_03_26_223752_create_lbo_appllations_table', 1),
(932, '2023_03_26_224621_create_lbo_case_statuses_table', 1),
(933, '2023_03_26_225844_create_lbo_devices_table', 1),
(934, '2023_03_26_231313_create_lbo_districts_table', 1),
(935, '2023_03_26_232341_create_lbo_employments_table', 1),
(936, '2023_03_26_232959_create_lbo_loan_purposes_table', 1),
(937, '2023_03_27_115139_create_companies_table', 1),
(938, '2023_04_19_222811_create_service_providers_table', 1),
(939, '2023_05_10_112114_create_notification_templates_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `notification_templates`
--

CREATE TABLE `notification_templates` (
  `send_template_id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '类型',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮件标题',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮件内容',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `notification_templates`
--

INSERT INTO `notification_templates` (`send_template_id`, `category`, `title`, `content`, `createtime`) VALUES
(1, 'agreed_loan', 'FG Loan', 'Dear [first_name] [last_name],Please confirm the personal infomation, and advise consent for referring to [name].', '2023-07-18 07:07:32'),
(2, 'admin_add_loan', 'Dear [first_name] [last_name]', 'Dear [first_name] [last_name],Admin added a loan for you, please check.Thanks.', '2023-07-18 07:07:32'),
(3, 'client_create', 'Dear [first_name] [last_name]', 'You have created a loan account. Please set your password.', '2023-07-18 07:07:32');

-- --------------------------------------------------------

--
-- 表的结构 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `service_providers`
--

CREATE TABLE `service_providers` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '主键',
  `sys_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '加密id',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名字',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓氏',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '密码',
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '手机号',
  `contact` bigint(20) DEFAULT NULL COMMENT '常联系人',
  `role` int(11) DEFAULT NULL COMMENT '规则',
  `company_id` int(11) NOT NULL COMMENT '所属机构id',
  `create_datetime` datetime DEFAULT NULL COMMENT '创建时间',
  `update_datetime` datetime DEFAULT NULL COMMENT '更新时间',
  `last_login_datetime` datetime DEFAULT NULL COMMENT '上次登录时间',
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '访问ip',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 0=禁用,1=启用',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token',
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '浏览器',
  `permission1` int(11) DEFAULT NULL,
  `permission2` int(11) DEFAULT NULL,
  `permission3` int(11) DEFAULT NULL,
  `permission4` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `service_providers`
--

INSERT INTO `service_providers` (`id`, `sys_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `contact`, `role`, `company_id`, `create_datetime`, `update_datetime`, `last_login_datetime`, `ip`, `status`, `token`, `browser`, `permission1`, `permission2`, `permission3`, `permission4`, `update_by`, `deleted_at`) VALUES
(1, 'eyJpdiI6Im96ZUNWVUJMQXBFcU5YcSt5R0dETUE9PSIsInZhbHVlIjoicHl3OVpuVGsrUDZWVng5YUs2WnBRZz09IiwibWFjIjoiODgyNTQzZjIwYTA3ZDgwNGMwYjNmNDE0YmRlODQ5ZjY4NzkzOWE4NWM2YmRmNmZiYjlkOGViOTk0NmJlNGQ3ZCIsInRhZyI6IiJ9', '志诚', '殷', 'sp@qq.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '18842938168', 17839387407, NULL, 2, '2023-07-18 07:07:32', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'eyJpdiI6InVjSXJJK3E4c3QybEVHZWJzYVZlbnc9PSIsInZhbHVlIjoiSmZ2MC8rcFdHWUFxQ0lkWkp4d1BpZz09IiwibWFjIjoiYzhkNDU0Y2UyMTU3Mzk3OWI5NjcxYjUyYzg3ZjRjODFhMTkwMTBlMjUzMzBhYmI1MGE0YWUyOTExYTNlMzQxYiIsInRhZyI6IiJ9', '波', '林', 'cupiditate67@126.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '17065289170', 17792764994, NULL, 2, '2023-07-18 07:07:32', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'eyJpdiI6IlQ5cDNpTWppRlVvOWtYQkpCTjBTYnc9PSIsInZhbHVlIjoiNlZ3UUlkTThOaEtUMHM2cmFmaVRYZz09IiwibWFjIjoiNmRhOTM1MDMxOTRjNjAxOGRiYzg2ZDgzNjU1NDJiYmI3NDk0NDExZjM5MjYwNGM4NDUwYWFjZjM1MWYzYjkxYSIsInRhZyI6IiJ9', '凯', '臧', 'tempore12@qq.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '14718302696', 15096722455, NULL, 2, '2023-07-18 07:07:32', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'eyJpdiI6ImpNQU9zWjM0L2h1b1lDUDZDNnZUanc9PSIsInZhbHVlIjoidGpxZWJCU0ZzdzVrUnlJb2JaL1RFdz09IiwibWFjIjoiZWQzMDNjMWEwYjdmYmNjNDdiMzIyN2U1MTY5Yzc3YTNhOTQ3NTFkNmYzNjhjNGY5Mjg1NGM3ZjZlNDRjYmQ1OCIsInRhZyI6IiJ9', '宁', '路', 'mollitia.sint@126.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '13415084944', 18031921173, NULL, 2, '2023-07-18 07:07:32', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'eyJpdiI6IjJvVmZkcGVObVFyTm1RM3hkOU9YcEE9PSIsInZhbHVlIjoiT3h0QXJUMWNuT0I4UGtyVkpvc2FKQT09IiwibWFjIjoiMzkyMWJlMGE4NzhlYjg3YWQzYjkyZTlmNmZhYmI0NDliYWQxNDMxODZhOTAwZjkzMDY0NzlkYTc0YjM5OTMyNCIsInRhZyI6IiJ9', '捷', '胡', 'et78@sohu.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '17013080641', 17037234482, NULL, 2, '2023-07-18 07:07:32', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- 表的索引 `individuals`
--
ALTER TABLE `individuals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `individuals_email_unique` (`email`);

--
-- 表的索引 `lbo_appellations`
--
ALTER TABLE `lbo_appellations`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `lbo_case_statuses`
--
ALTER TABLE `lbo_case_statuses`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `lbo_devices`
--
ALTER TABLE `lbo_devices`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `lbo_districts`
--
ALTER TABLE `lbo_districts`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `lbo_employments`
--
ALTER TABLE `lbo_employments`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `lbo_genders`
--
ALTER TABLE `lbo_genders`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `lbo_loan_purposes`
--
ALTER TABLE `lbo_loan_purposes`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`send_template_id`);

--
-- 表的索引 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 表的索引 `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_providers_email_unique` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- 使用表AUTO_INCREMENT `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `individuals`
--
ALTER TABLE `individuals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=21;

--
-- 使用表AUTO_INCREMENT `lbo_appellations`
--
ALTER TABLE `lbo_appellations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `lbo_case_statuses`
--
ALTER TABLE `lbo_case_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `lbo_devices`
--
ALTER TABLE `lbo_devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `lbo_districts`
--
ALTER TABLE `lbo_districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `lbo_employments`
--
ALTER TABLE `lbo_employments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `lbo_genders`
--
ALTER TABLE `lbo_genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `lbo_loan_purposes`
--
ALTER TABLE `lbo_loan_purposes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=940;

--
-- 使用表AUTO_INCREMENT `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `send_template_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
