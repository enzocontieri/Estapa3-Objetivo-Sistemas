<?php 

    class Produto {
        //Propriedade que armazena os dados
        public $data;
        
        // Método de cadastro do produto passando parametro $data inicialmente como null
        public function setProduto($data = null){
            // Verifica se $data for diferente de null e se $data é um array permitindo passar os valores diretamente ao chamar a função 
            if ($data !== null && is_array($data)) {
                $this->data = array(
                    'nome' => $data['nome'] ?? null,
                    'preco' => $data['preco'] ?? null,
                    'quantidade' => $data['quantidade'] ?? null
                    
                );
            } else {
                // Avisa caso $data seja nulo ou não seja um array 
                echo "Erro: O array é inválido.";
                // Retorna null para data
                $this->data = null;
            }
            // Retorna os valores cadastrados para a propriedade data 
            return $this->data;
        }
        // Método que exibi o produto atualmente cadastrado 
        public function getProduto(){
            // Retorna os valores do produto para data 
            return $this->data;
            echo "Produto Cadastrado" . "Nome: " . $this->data['nome'] . ", Preço: " . $this->data['preco'] . ", Quantidade: " . $this->data['quantidade'];
        }
    }

    class Venda extends Produto {
        public $quantidadeVenda = 0;
        public $desconto;

        // Método para realizar uma venda
        public function setVenda(){
            // Obtem os dados que estao cadastrados em data
            $produto = $this->getProduto();

            if ($produto !== null){
                // Aumenta a quantidade de vendas realizadas
                $this->quantidadeVenda++;
                
                // Decrementa a quantidade total do produto em -1
                $produto['quantidade']--;


                // Atualiza a quantidade total na propriedade $data
                $this->setProduto($produto);
            } else {
                echo "Erro: Produto não cadastrado.";
            }

        }

        // Método para obter os dados da última venda e o estoque atual.
        public function getVenda(){
            // Chama getProduto para obter os dados do produto 
            $produto = $this->getProduto();

            // Exibe a quantidade de vendas realizadas e o estoque atual do produto 
            if ($produto !== null) {
            echo " Vendas Realizadas: " . $this->quantidadeVenda . " Estoque Atual: " . $produto['quantidade'];
            }

        }
    }

    // Teste da logica aplicada chamando getVenda e getProduto 
    $dadosProduto = array(
        'nome' => 'Produto A',
        'preco' => 20.99,
        'quantidade' => 50
    );

    $venda = new Venda();
    $venda->setProduto($dadosProduto);  
    $venda->setVenda();
    $venda->getVenda();

    $dadosDoProduto = $venda->getProduto();
    print_r($dadosDoProduto);
?> 