SELECT COUNT(*) jumlah_data FROM mr_pasien GROUP BY id_kecamatan

SELECT COUNT(*) AS b FROM mr_pasien WHERE id_kabupaten = 3471

SELECT nama_matkul,jumlah_SKS,nama_dosen FROM mata_kuliah
INNER JOIN daftar_dosen ON NIP_dosen=NIP

SELECT * FROM mr_pasien INNER JOIN mr_kecamatan_bps ON mr_pasien.id_kecamatan = mr_kecamatan_bps.id_kecamatan

34712

SELECT COUNT(id_kecamatan) AS jumlah FROM mr_pasien WHERE id_kecamatan = 342140

SELECT nama_kecamatan FROM mr_kecamatan_bps INNER JOIN mr_pasien ON mr_kecamatan_bps.id_kecamatan = mr_pasien.id_kecamatan