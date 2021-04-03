create database nienluanct271;
use nienluanct271;

insert into quantri values('admin','$2y$12$P/UBekynLISCPfmWogBt1e7ZS.3o8bAXRJBjmR7cgCfTEFVNJSduq');

-- Bang thuonghieu
create table thuonghieu(
	idthuonghieu varchar(10) primary key,
    tenthuonghieu varchar(50),
	logo varchar(100)
);
alter table thuonghieu add logo varchar(100);
describe thuonghieu;

insert into thuonghieu values ('01', 'Citizen', 'images/thuonghieu/citizen.png');

-- Bang khachhang
create table khachhang(
	taikhoan varchar(50) primary key,
    matkhau varchar(64),
    hokh varchar(40),
    tenkh varchar(40),
    gioitinh varchar(8),
    sdt varchar(11),
    diachi varchar(100),
    anhdaidien varchar(100)
);

select * from khachhang limit 10;

create table hanghoa(
	idthuonghieu varchar(10),
    idhanghoa varchar(10) primary key,
    tenhanghoa varchar(50),
    phai varchar(5),
    gia double check (gia>0),
    soluong int check (soluong>0),
    foreign key (idthuonghieu) references thuonghieu(idthuonghieu)
);

alter table hanghoa add image varchar(100);

insert into hanghoa values('01','ct01','ĐỒNG HỒ CITIZEN NH8390-71L','Nam',8177000,10);
update hanghoa set image = 'images/hanghoa/dong-ho-citizen-nh8390-71l_1604907945.jpg' where idhanghoa = 'ct01';

create table donhang(
	id int auto_increment primary key,
    taikhoan varchar(50),
    tonggiatri double,
    trangthai varchar(30),
    foreign key (taikhoan) references khachhang(taikhoan)
);

drop table chitietdonhang;
create table chitietdonhang(
	iddonhang int,
    idhanghoa varchar(10),
    soluong int check(soluong > 0),
    thanhtien double check (thanhtien > 0),
    foreign key (idhanghoa) references hanghoa(idhanghoa),
    foreign key (iddonhang) references donhang(id),
    primary key (iddonhang, idhanghoa)
);

drop table giohang;
create table giohang(
	id int auto_increment primary key,
	idkhachhang varchar(50),
    tonggiatri double check(tonggiatri >= 0) default 0,
    foreign key (idkhachhang) references khachhang(taikhoan)
);

drop table chitietgiohang;
create table chitietgiohang(
	idgiohang int,
    idhanghoa varchar(10),
    soluong int check(soluong > 0),
    thanhtien double check (thanhtien > 0),
    foreign key (idgiohang) references giohang(id),
    foreign key (idhanghoa) references hanghoa(idhanghoa),
    primary key (idgiohang,idhanghoa)
);

select * from giohang;