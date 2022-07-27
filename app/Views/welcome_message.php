<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url('assets/js/axios.min.js') ?>" defer></script>
    <title>Coding Test</title>
</head>
<body>
    <form id="form-mahasiswa" method="POST">
        <div>
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" />
        </div>
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" />
        </div>
        <div>
            <label for="hp">No. HP</label>
            <input type="text" name="hp" id="hp" />
        </div>
        <div>
            <div for="jk">Jenis Kelamin</div>
            <input type="radio" name="jk" id="jk_pria" value="pria" /><label for="jk_pria">Pria</label>
            <input type="radio" name="jk" id="jk_wanita" value="wanita" /><label for="jk_wanita">Wanita</label>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    <script>
        document.getElementById('form-mahasiswa').addEventListener('submit', function(e){
            e.preventDefault();
            const target = e.target;

            const jsonObject = {
                nim: target.querySelector('[name=\'nim\']').value,
                nama: target.querySelector('[name=\'nama\']').value,
                hp: target.querySelector('[name=\'hp\']').value,
                jk: target.querySelector('[name=\'jk\']:checked').value
            };

            axios.post('<?= base_url('mahasiswa') ?>', jsonObject)
                .then((res) =>{
                    target.querySelector('[name=\'nim\']').value =
                    target.querySelector('[name=\'nama\']').value =
                    target.querySelector('[name=\'hp\']').value = '';
                    target.querySelector('[name=\'jk\']:checked').checked = false; 
                });
        });
    </script>
</body>
</html>