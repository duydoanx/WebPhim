CREATE DATABASE WEBPHIM;
USE WEBPHIM;

#drop database WEBPHIM;

CREATE TABLE THELOAI(
    ID INT not null AUTO_INCREMENT,
    TENTHELOAI text,
    PRIMARY KEY (ID)
);

CREATE TABLE PHIM(
    ID INT NOT NULL AUTO_INCREMENT,
    TENPHIMVN text,
    TENPHIMGOC text,
    TRANGTHAI text,
    NAMPHATHANH DATE,
    THOILUONG INT,
    CHATLUONG text,
    DOPHANGIAI text,
    NGONNGU text,
    ANHPHIM TEXT,
    NOIDUNGPHIM TEXT,
    DUONGDAN TEXT,
    DANHGIA INT,
    TRAILER TEXT,
    PRIMARY KEY (ID)
);

CREATE TABLE PHIMDECU(
    IDPHIM INT PRIMARY KEY
);

CREATE TABLE CHITIETTHELOAI(
    IDPHIM INT,
    IDTHELOAI INT,
    PRIMARY KEY (IDPHIM, IDTHELOAI)
);

CREATE TABLE PHIMLE(
    IDPHIM INT,
    PRIMARY KEY (IDPHIM)
);

CREATE TABLE PHIMBO(
    IDPHIM INT,
    SOTAP INT,
    SOTAPHIENTAI INT,
    PRIMARY KEY (IDPHIM)
);
CREATE TABLE NGUOI(
    ID INT NOT NULL AUTO_INCREMENT,
    HOTEN text,
    NGAYSINH DATE,
    QUOCTICH text,
    TIEUSU TEXT,
    PRIMARY KEY (ID)
);
CREATE TABLE DAODIEN(
    IDDAODIEN INT NOT NULL PRIMARY KEY
);

CREATE TABLE DIENVIEN(
    IDDIENVIEN INT NOT NULL PRIMARY KEY
);

CREATE TABLE CHITEIDAODIEN(
    IDDAODIEN INT,
    IDPHIM INT,
    PRIMARY KEY (IDDAODIEN, IDPHIM)
);

CREATE TABLE CHITIETDIENVIEN(
    IDDIENVIEN INT,
    IDPHIM INT,
    PRIMARY KEY (IDDIENVIEN, IDPHIM)
);

CREATE TABLE QUOCGIA(
    ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY ,
    TEN text
);

CREATE TABLE CHITIETQUOCGIA(
    IDPHIM INT,
    ID INT,
    PRIMARY KEY (IDPHIM, ID)
);

CREATE TABLE USER(
    USERNAME VARCHAR(50) UNIQUE,
    PASSWORD VARCHAR(32),
    ISADMIN bit,
    EMAIL VARCHAR(100),
    HOTEN TEXT,
    NGAYSINH DATE,
    primary key (EMAIL)
);

CREATE TABLE COMMENT(
    ID INT NOT NULL AUTO_INCREMENT,
    EMAIL VARCHAR(50),
    IDPHIM INT,
    THOIGIAN DATETIME,
    NOIDUNG TEXT,
    PRIMARY KEY (ID)
);

ALTER TABLE CHITIETTHELOAI ADD CONSTRAINT FK_CHITIETTHELOAI_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETTHELOAI ADD CONSTRAINT FK_CHITIETTHELOAI_THELOAI FOREIGN KEY (IDTHELOAI) REFERENCES THELOAI(ID);
ALTER TABLE PHIMLE ADD CONSTRAINT FK_PHIMLE_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE PHIMBO ADD CONSTRAINT FK_PHIMbO_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITEIDAODIEN ADD CONSTRAINT FK_CHITIETDAODIEN_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITEIDAODIEN ADD CONSTRAINT FK_CHITIETDAODIEN_DAODIEN FOREIGN KEY (IDDAODIEN) REFERENCES DAODIEN(IDDAODIEN);
ALTER TABLE CHITIETDIENVIEN ADD CONSTRAINT FK_CHITIETDIENVIEN_DIENVIEN FOREIGN KEY (IDDIENVIEN) REFERENCES DIENVIEN(IDDIENVIEN);
ALTER TABLE CHITIETDIENVIEN ADD CONSTRAINT FK_CHITIETDIENVIEN_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETQUOCGIA ADD CONSTRAINT FK_CHITIETQUOCGIA_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETQUOCGIA ADD CONSTRAINT FK_CHITIETQUOCGIA_QUOCGIA FOREIGN KEY (ID) REFERENCES QUOCGIA(ID);
ALTER TABLE PHIMDECU ADD CONSTRAINT FK_PHIMDECU_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE COMMENT ADD CONSTRAINT FK_COMMENT_USER FOREIGN KEY (EMAIL) REFERENCES USER(EMAIL);
ALTER TABLE COMMENT ADD CONSTRAINT FK_COMMENT_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);



INSERT INTO THELOAI(TENTHELOAI) VALUES ('Phim hành động'),
                                       ('Phim viễn tưởng'),
                                       ('Phim chiến tranh'),
                                       ('Phim hình sự'),
                                       ('Phim phiêu lưu'),
                                       ('Phim hài hước'),
                                       ('Phim võ thuật'),
                                       ('Phim kinh dị'),
                                       ('Phim hồi hộp - gây cấn'),
                                       ('Phim bí ẩn - siêu nhiên'),
                                       ('Phim cổ trang'),
                                       ('Phim thần thoại'),
                                       ('Phim tâm lý'),
                                       ('Phim tài liệu'),
                                       ('Phim tình cảm - lãng mạn'),
                                       ('Phim chính kịch - Drama'),
                                       ('Phim thể thao - âm nhạc'),
                                       ('Phim gia đình'),
                                       ('Phim hoạt hình');
INSERT INTO QUOCGIA(TEN) VALUES('Việt Nam');
INSERT INTO QUOCGIA(TEN) VALUES('Mỹ');
INSERT INTO QUOCGIA(TEN) VALUES('Hàn Quốc');
INSERT INTO QUOCGIA(TEN) VALUES('Trung Quốc');
INSERT INTO QUOCGIA(TEN) VALUES('Nhật Bản');
INSERT INTO QUOCGIA(TEN) VALUES('Hồng Kông');
INSERT INTO QUOCGIA(TEN) VALUES('Ấn Độ');
INSERT INTO QUOCGIA(TEN) VALUES('Thái Lan');
INSERT INTO QUOCGIA(TEN) VALUES('Pháp');
INSERT INTO QUOCGIA(TEN) VALUES('Đài Loan');
INSERT INTO QUOCGIA(TEN) VALUES('Úc');
INSERT INTO QUOCGIA(TEN) VALUES('Anh');
INSERT INTO QUOCGIA(TEN) VALUES('Cananda');
INSERT INTO QUOCGIA(TEN) VALUES('Quốc gia khác');

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('Captain Ameriaca 3: Nội chiến Siêu Anh Hùng', 'Captain America 3: Civil War', 'Hoàn tất', '2016-4-26', 147, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/1.jpg', 'Captain America: Civil War là câu chuyện theo
sau sự kiện Avengers: Age Of Ultron, các liên minh chính phủ trên toàn thế giới thông qua một hiệp ước được thiết lập
để điều chỉnh hoạt động của tất cả siêu anh hùng. Điều này gây ra sự phân cực trong nội bộ nhóm Avengers,
tạo nên hai phe gồm Iron Man và Captain America, gây ra một trận chiến sử thi giữa những người đồng đội.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('THIÊN TỈNH CHI LỘ', 'Legend of Awakening (2020)', 'chưa hoàn tất', '2020-4-23', 45, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/2.jpg', 'Bộ phim kể về thời Đại Nam Bắc Triều - người dân đã bị thú dữ tàn phá nên họ bắt đầu tu luyện như một vũ khí tự bảo vệ. Bốn anh hùng trẻ tuổi bắt đầu trên một hành trình hướng tới sự thức tỉnh. Lộ Bình và Tô Đường là trẻ mồ côi. Trường võ thuật Trạch Phong đưa họ vào khi họ còn trẻ và họ trở thành bạn tốt với Tần Tang và Yến Tây Phàm. Cả bốn làm một hiệp ước để trở thành một trong những người thức tỉnh, do đó bắt đầu trên một con đường nơi họ sẽ đối mặt với nhiều đối thủ khác nhau để đạt được mục tiêu của mình.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('QUỶ LÙN TINH NGHỊCH: CHUYẾN LƯU DIỄN THẾ GIỚI', 'Trolls World Tour (2020)', 'Hoàn tất', '2020-4-23', 45, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/3.jpg', 'Tiếp nối phần trước, Quỷ lùn tinh nghịch: Chuyến lưu diễn thế giới đưa người xem trở lại thế giới Trolls cùng Poppy, cô quỷ lùn vui vẻ nhất từng được biết tới. Qua lời kể của “già làng” King Peppy, nguồn gốc của vương quốc Trolls dần được hé lộ. Từ rất xưa tổ tiên trolls đã tạo ra cây đàn thần 6 dây, mỗi dây ứng với một thể loại nhạc khác nhau gồm pop, đồng quê - country, funk, techno, cổ điển và rock.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('CẬU BÉ MA II', 'Brahms: The Boy II (2019)', 'Hoàn tất', '2019-12-31', null, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/4.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('ĐẢO KINH HOÀNG', 'Fantasy Island (2020)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/5.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('TIẾNG GỌI NƠI HOANG DÃ', 'The Call of the Wild (2020)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/6.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('SÁT THỦ VÔ CÙNG CỰC', 'Hitman: Agent Jun (2020)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/7.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('ĐỨA CON CỦA THỜI TIẾT', 'Weathering With You (2019)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/8.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', '8.mkv', null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('TRUY TÌM PHÉP THUẬT', 'Onward (2020)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/9.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('TÌM LẠI CẢM XÚC', 'Cashback (2007)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/10.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', '10.mp4', null, 'siXe9XC723s');

INSERT INTO PHIMDECU VALUES (10),(9),(8),(7),(6),(5),(4),(3),(2);

INSERT INTO USER(USERNAME, PASSWORD, ISADMIN, EMAIL, HOTEN, NGAYSINH) VALUES
('DuyDoan', 'e10adc3949ba59abbe56e057f20f883e', 1, 'duydoan1411@gmail.com', 'Đoàn Bảo Duy', '1999-11-14');
INSERT INTO USER(USERNAME, PASSWORD, ISADMIN, EMAIL, HOTEN, NGAYSINH) VALUES
('DuyDoan1', 'e10adc3949ba59abbe56e057f20f883e', 0, 'duydoan1411user@gmail.com', 'Đoàn Bảo Duy', '1999-11-14');



SELECT * FROM COMMENT;
SELECT * FROM PHIMDECU, PHIM where IDPHIM=ID;

#test

#testgit