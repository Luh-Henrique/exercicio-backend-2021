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

    //Inicializando variaveis para não ocorrer erro durante o loop
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
  }
}