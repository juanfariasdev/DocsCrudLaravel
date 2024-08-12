<script>
    document.getElementById('cep').addEventListener('blur', function() {
        const cep = this.value.replace(/\D/g, '');

        if (cep.length === 8) {
            const url = `https://viacep.com.br/ws/${cep}/json/`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('rua').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;

                        // Desbloqueia apenas os campos de rua, número, e bairro
                        document.getElementById('rua').removeAttribute('readonly');
                        document.getElementById('numero').removeAttribute('readonly');
                        document.getElementById('bairro').removeAttribute('readonly');
                    } else {
                        alert('CEP não encontrado!');
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar CEP:', error);
                    alert('Erro ao buscar CEP. Tente novamente.');
                });
        } else {
            alert('CEP inválido!');
        }
    });
</script>
