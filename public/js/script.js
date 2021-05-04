const select = document.querySelector('select');

select.addEventListener('click', function() {
  const opt1 = document.getElementById('optjurusan');
  const opt2 = document.getElementById('optkelas');
  opt1.setAttribute('disabled', 'disabled');
  opt2.setAttribute('disabled', 'disabled');
});

const xtkj = document.getElementsByClassName('xtkj');
const xrpl = document.getElementsByClassName('xrpl');
const xmm = document.getElementsByClassName('xmm');
const xdkv = document.getElementsByClassName('xdkv');
const xan = document.getElementsByClassName('xan');

const tkj = document.getElementById('tkj');
const rpl = document.getElementById('rpl');
const mm = document.getElementById('mm');
const dkv = document.getElementById('tkj');
const an = document.getElementById('an');

tkj.addEventListener('click', function() {
  console.log('Hello World');
});