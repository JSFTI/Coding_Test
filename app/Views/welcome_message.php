<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url('assets/js/axios.min.js') ?>"></script>
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
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody id="table-body">
            
        </tbody>
    </table>
    <script>
        const tableBody = document.getElementById('table-body');

        function appendRow(i, data){
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${i}</td>
                <td>${data.nim}</td>
                <td>${data.nama}</td>
                <td>${data.hp}</td>
                <td>${data.jk === 'pria' ? 'Pria' : 'Wanita'}</td>
            `;
            tableBody.appendChild(tr);
        }

        function getData(){
            tableBody.innerHTML = '';
            axios.get('<?= base_url('mahasiswa') ?>')
                .then((res) => {
                    for(let i = 0; i < res.data.length; i++){
                        appendRow(i + 1, res.data[i]);
                    }
                });
        }

        getData();

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
                    getData();
                    target.querySelector('[name=\'nim\']').value =
                    target.querySelector('[name=\'nama\']').value =
                    target.querySelector('[name=\'hp\']').value = '';
                    target.querySelector('[name=\'jk\']:checked').checked = false; 
                });
        });
    </script>
</body>
</html>