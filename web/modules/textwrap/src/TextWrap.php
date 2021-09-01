<?php

namespace Drupal\textwrap;

/**
 * Implemente sua resolução nessa classe.
 *
 * Depois disso:
 * - [ ] Crie um PR no github com seu código
 * - [ ] Veja o resultado da correção automática do seu código
 * - [ ] Commit até os testes passarem
 * - [ ] Passou tudo, melhore a cobertura dos testes
 * - [ ] Ficou satisfeito, envie seu exercício para a gente! <3
 *
 * Boa sorte :D
 */
class TextWrap implements TextWrapInterface {

  /**
   * {@inheritdoc}
   */
  public function wrap(string $text, int $length): array {
    // Apague o código abaixo e escreva sua própria implementação,
    // nós colocamos esse mock para poder rodar a análise de cobertura dos
    // testes unitários.

    //Arrays que vamos manipular para quebrar a string
    $array_ini = [''];
    $array_final = [''];

    //Verificando se possui texto para quebrar
    if(empty($text)){
      return $array_final;
    }

    //Inicializando variáveis para não ocorrer erros durante o loop
    $array_ini[0] = '';
    $j = 0;

    //Quebra a string em um array com cada posição sendo uma palavra, para melhor manipulação
    for($i=0;$i<=mb_strlen($text);$i++){

      if($text[$i] == ' '){
        $j++;
        $array_ini[$j]='';
      }

      //Copiando caracteres da string para o vetor
      else{
      $array_ini[$j] = $array_ini[$j].$text[$i];
      }
    }

    //Resetando variáveis para uso no loop
    $j = 0;
    $k = 0;
    $array_final[0] = '';

    //Laço para manipulação final da string
    for($i=0;$i<count($array_ini);$i++){
  
      //Primeiro verifica se o tamanho do que já está no array final somado com a palavra 
      //que estamos analisando é menor que o tamanho especificado
      if((mb_strlen($array_final[$k])+mb_strlen($array_ini[$i]))<$length){

        //Caso sim e não tenha nada na posição do array final, copia a palavra inteira
        if(empty($array_final[$k])){
          $array_final[$k] = $array_final[$k].$array_ini[$i];
        }

        //Caso ja tenha algo se coloca um espaço entre as palavras
        else{
          $array_final[$k] = $array_final[$k].' '.$array_ini[$i];
        }

      }

      //Caso a palavra que está no array final somada a palavra analisada exceda o tamanho especificado
      else{

        //Muda a posição do array e se inicia a posição como vazia para não dar erro
        $k++;
        $array_final[$k] = '';

        //Caso a palavra esteja dentro do limite especificado, é escrita por inteiro
        if(mb_strlen($array_ini[$i])<$length){
          $array_final[$k] = $array_ini[$i];
        }

        //Caso negativo se copia caractere por caractere, obedecendo o limite de caracteres
        else{

          //Variável auxiliar para verificar se o atingiu o limite da linha para este caso
          $n=0;
          for($j=0;$j<mb_strlen($array_ini[$i]);$j++){
            $n++;
            $array_final[$k] = $array_final[$k].$array_ini[$i][$j];

            //Caso o limite de caracteres seja atingido se troca a posição do vetor
            if($n>$length){
            $k++;
            $n=0;
            $array_final[$k]='';;
            }
          }
        }
      }
    }

    //Retorna o array final com as palavras quebradas de acordo com a especificação
    return $array_final;
  }
}