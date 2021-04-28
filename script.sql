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
    image varchar(100),
    foreign key (idthuonghieu) references thuonghieu(idthuonghieu)
);

select * from hanghoa;

insert into hanghoa values('01','ct01','ĐỒNG HỒ CITIZEN NH8390-71L','Nam',8177000,10);
insert into hanghoa values('01','ct02','ĐỒNG HỒ CITIZEN NH8390-20H','Nam',7577000,5,'images/hanghoa/dong-ho-citizen-nh8390-20h_1604907824.jpg');
insert into hanghoa values('01','ct03','ĐỒNG HỒ CITIZEN NH8395-00E','Nam',9977000,5,'images/hanghoa/dong-ho-citizen-nh8395-00e_1605258794.jpg');
update hanghoa set image = 'images/hanghoa/dong-ho-citizen-nh8390-71l_1604907945.jpg' where idhanghoa = 'ct01';

create table donhang(
	id int auto_increment primary key,
    taikhoan varchar(50),
    tonggiatri double,
    trangthai varchar(30),
    chuthich varchar(200),
    foreign key (taikhoan) references khachhang(taikhoan)
);
alter table donhang modify ngaydathang datetime default (current_timestamp());
alter table donhang add column thanhtoan varchar(100) default ("Chưa Thanh Toán");

alter table donhang add chuthich varchar(200);

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
select * from chitietgiohang;
select * from chitietdonhang;
select * from donhang;

select * from chitietdonhang;

delimiter //
create trigger capNhatTongGiaTriDonHang after insert on chitietdonhang for each row
begin
	UPDATE donhang SET tonggiatri = tonggiatri + new.thanhtien where id = new.iddonhang;
end//
delimiter ;

drop trigger capNhatTongGiaTriDonHang;
drop trigger themNgayDatHang;


select * from thuonghieu;
select * from hanghoa;

delete from chitietdonhang where iddonhang!=1;
delete from donhang where id!=1;
