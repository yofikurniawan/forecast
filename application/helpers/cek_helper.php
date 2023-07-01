<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('tgl_indo')) {
    function date_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('bulan')) {
    function bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

//Format Shortdate
if (!function_exists('shortdate_indo')) {
    function shortdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = short_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '/' . $bulan . '/' . $tahun;
    }
}

if (!function_exists('short_bulan')) {
    function short_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }
}

//Format Medium date
if (!function_exists('mediumdate_indo')) {
    function mediumdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '-' . $bulan . '-' . $tahun;
    }
}

if (!function_exists('medium_bulan')) {
    function medium_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}

//Long date indo Format
if (!function_exists('longdate_indo')) {
    function longdate_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);

        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        $nama_hari = "";
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        return $nama_hari . ',' . $tgl . ' ' . $bulan . ' ' . $thn;
    }

    function tgl_indo($tgl) {
		$tanggal = substr($tgl,8,2);
		$bulan = substr($tgl,5,2);
		if($bulan==1) {
			$bulan = "Jan";
		} else if($bulan==2) {
			$bulan = "Feb";
		} else if($bulan==3) {
			$bulan = "Mar";
		} else if($bulan==4) {
			$bulan = "Apr";
		} else if($bulan==5) {
			$bulan = "Mei";
		} else if($bulan==6) {
			$bulan = "Jun";
		} else if($bulan==7) {
			$bulan = "Jul";
		} else if($bulan==8) {
			$bulan = "Agu";
		} else if($bulan==9) {
			$bulan = "Sep";
		} else if($bulan==10) {
			$bulan = "Okt";
		} else if($bulan==11) {
			$bulan = "Nov";
		} else if($bulan==12) {
			$bulan = "Des";
		} 
		$tahun = substr($tgl,2,2);
		return $tanggal.'/'.$bulan.'/'.$tahun;		 
	}

	function bulan_indo($bulan) {
		if($bulan==1) {
			return "Januari";
		} else if($bulan==2) {
			return "Februari";
		} else if($bulan==3) {
			return "Maret";
		} else if($bulan==4) {
			return "April";
		} else if($bulan==5) {
			return "Mei";
		} else if($bulan==6) {
			return "Juni";
		} else if($bulan==7) {
			return "Juli";
		} else if($bulan==8) {
			return "Agustus";
		} else if($bulan==9) {
			return "September";
		} else if($bulan==10) {
			return "Oktober";
		} else if($bulan==11) {
			return "November";
		} else if($bulan==12) {
			return "Desember";
		} 
	}

    function bulan_tahun($bulan) {
        if($bulan==1 . '/'. 2019) {
            return "Januari 2019";
        } else if($bulan==2 . '/'. 2019) {
            return "Februari 2019";
        } else if($bulan==3 . '/'. 2019) {
            return "Maret 2019";
        } else if($bulan==4 . '/'. 2019) {
            return "April 2019";
        } else if($bulan==5 . '/'. 2019) {
            return "Mei 2019";
        } else if($bulan==6 . '/'. 2019) {
            return "Juni 2019";
        } else if($bulan==7 . '/'. 2019) {
            return "Juli 2019";
        } else if($bulan==8 . '/'. 2019) {
            return "Agustus 2019";
        } else if($bulan==9 . '/'. 2019) {
            return "September 2019";
        } else if($bulan==10 . '/'. 2019) {
            return "Oktober 2019";
        } else if($bulan==11 . '/'. 2019) {
            return "November 2019";
        } else if($bulan==12 . '/'. 2019) {
            return "Desember 2019";
        }  else if($bulan==1 . '/'. 2020) {
            return "Januari 2020";
        } else if($bulan==2 . '/'. 2020) {
            return "Februari 2020";
        } else if($bulan==3 . '/'. 2020) {
            return "Maret 2020";
        } else if($bulan==4 . '/'. 2020) {
            return "April 2020";
        } else if($bulan==5 . '/'. 2020) {
            return "Mei 2020";
        } else if($bulan==6 . '/'. 2020) {
            return "Juni 2020";
        } else if($bulan==7 . '/'. 2020) {
            return "Juli 2020";
        } else if($bulan==8 . '/'. 2020) {
            return "Agustus 2020";
        } else if($bulan==9 . '/'. 2020) {
            return "September 2020";
        } else if($bulan==10 . '/'. 2020) {
            return "Oktober 2020";
        } else if($bulan==11 . '/'. 2020) {
            return "November 2020";
        } else if($bulan==12 . '/'. 2020) {
            return "Desember 2020";
        }  else if($bulan==1 . '/'. 2021) {
            return "Januari 2021";
        } else if($bulan==2 . '/'. 2021) {
            return "Februari 2021";
        } else if($bulan==3 . '/'. 2021) {
            return "Maret 2021";
        } else if($bulan==4 . '/'. 2021) {
            return "April 2021";
        } else if($bulan==5 . '/'. 2021) {
            return "Mei 2021";
        } else if($bulan==6 . '/'. 2021) {
            return "Juni 2021";
        } else if($bulan==7 . '/'. 2021) {
            return "Juli 2021";
        } else if($bulan==8 . '/'. 2021) {
            return "Agustus 2021";
        } else if($bulan==9 . '/'. 2021) {
            return "September 2021";
        } else if($bulan==10 . '/'. 2021) {
            return "Oktober 2021";
        } else if($bulan==11 . '/'. 2021) {
            return "November 2021";
        } else if($bulan==12 . '/'. 2021) {
            return "Desember 2021";
        } 
    }

    function tahun_bulan($bulan) {
        if($bulan==2019 . '-'. 1) {
            return "Januari 2019";
        } else if($bulan==2019 . '-'. 2) {
            return "Februari 2019";
        } else if($bulan==2019 . '-'. 3) {
            return "Maret 2019";
        } else if($bulan==2019 . '-'. 4) {
            return "April 2019";
        } else if($bulan==2019 . '-'. 5) {
            return "Mei 2019";
        } else if($bulan==2019 . '-'. 6) {
            return "Juni 2019";
        } else if($bulan==2019 . '-'. 7) {
            return "Juli 2019";
        } else if($bulan==2019 . '-'. 8) {
            return "Agustus 2019";
        } else if($bulan==2019 . '-'. 9) {
            return "September 2019";
        } else if($bulan==2019 . '-'. 10) {
            return "Oktober 2019";
        } else if($bulan==2019 . '-'. 11) {
            return "November 2019";
        } else if($bulan==2019 . '-'. 12) {
            return "Desember 2019";
        }  else if($bulan==2020 . '-'. 1) {
            return "Januari 2020";
        } else if($bulan==2020 . '-'. 2) {
            return "Februari 2020";
        } else if($bulan==2020 . '-'. 3) {
            return "Maret 2020";
        } else if($bulan==2020 . '-'. 4) {
            return "April 2020";
        } else if($bulan==2020 . '-'. 5) {
            return "Mei 2020";
        } else if($bulan==2020 . '-'. 6) {
            return "Juni 2020";
        } else if($bulan==2020 . '-'. 7) {
            return "Juli 2020";
        } else if($bulan==2020 . '-'. 8) {
            return "Agustus 2020";
        } else if($bulan==2020 . '-'. 9) {
            return "September 2020";
        } else if($bulan==2020 . '-'. 10) {
            return "Oktober 2020";
        } else if($bulan==2020 . '-'. 11) {
            return "November 2020";
        } else if($bulan==2020 . '-'. 12) {
            return "Desember 2020";
        }  else if($bulan==2021 . '-'. 1) {
            return "Januari 2021";
        } else if($bulan==2021 . '-'. 2) {
            return "Februari 2021";
        } else if($bulan==2021 . '-'. 3) {
            return "Maret 2021";
        } else if($bulan==2021 . '-'. 4) {
            return "April 2021";
        } else if($bulan==2021 . '-'. 5) {
            return "Mei 2021";
        } else if($bulan==2021 . '-'. 6) {
            return "Juni 2021";
        } else if($bulan==2021 . '-'. 7) {
            return "Juli 2021";
        } else if($bulan==2021 . '-'. 8) {
            return "Agustus 2021";
        } else if($bulan==2021 . '-'. 9) {
            return "September 2021";
        } else if($bulan==2021 . '-'. 10) {
            return "Oktober 2021";
        } else if($bulan==2021 . '-'. 11) {
            return "November 2021";
        } else if($bulan==2021 . '-'. 12) {
            return "Desember 2021";
        } 
    }

	function periode($tgl) {
		$tanggal = substr($tgl,8,2);
		$bulan = substr($tgl,5,2);
		if($bulan==1) {
			$bulan = "Januari";
		} else if($bulan==2) {
			$bulan = "Februari";
		} else if($bulan==3) {
			$bulan = "Maret";
		} else if($bulan==4) {
			$bulan = "April";
		} else if($bulan==5) {
			$bulan = "Mei";
		} else if($bulan==6) {
			$bulan = "Juni";
		} else if($bulan==7) {
			$bulan = "Juli";
		} else if($bulan==8) {
			$bulan = "Agustus";
		} else if($bulan==9) {
			$bulan = "September";
		} else if($bulan==10) {
			$bulan = "Oktober";
		} else if($bulan==11) {
			$bulan = "November";
		} else if($bulan==12) {
			$bulan = "Desember";
		} 
		$tahun = substr($tgl,0,4);
		return $bulan.' '.$tahun;		 
	}
}
