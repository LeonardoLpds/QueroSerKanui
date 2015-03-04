Digital Display
======
Este é um parser. Você deve escrever um programa que leia um arquivo cujo formato simula um leitor digital, por exemplo:

<pre>
    _  _     _  _  _  _  _
  | _| _||_||_ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _|

</pre>

Seu programa deverá parsear este tipo de entrada e gerar a saída como números, seguindo o exemplo:

	123456789

Toda seqüência numérica terá 3 linhas, seguida por uma quarta linha em branco. A largura de cada dígito do formato é 3, sempre composta por **pipes**, **underlines** e **espaços** ('|', '_' e ' ', respectivamente); todo grupo de 3 primeiras linhas terá 9 dígitos, correspondendo a 27 caracteres. Porém é **importante** que seu programa esteja preparado para uma entrada como:

<pre>
    _  _     _  _  _  _  _
  | _| _ |_||_ |_   ||_||_|
  ||_  _|  | _ |_|  ||_  _|

</pre>

Este caso deve retornar uma linha com a *string* "/!\erro de formato/!\".

Neste repositório existe um arquivo **data.txt** que você pode usar em seu teste.

**Exemplo de entrada/data.txt**:
<pre>
    _  _     _  _  _  _  _ 
  | _| _||_||_ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _|

 _  _     _     _  _  _  _ 
|_  _|  ||_||_| _||_   ||_|
|_||_   | _|  | _| _|  ||_|

    _  _     _  _  _  _  _
  | _| _ |_||_ |_   ||_||_|
  ||_  _|  | _ |_|  ||_  _|

 _  _  _  _  _  _  _  _  _ 
| || || || || || ||_ |_ |_ 
|_||_||_||_||_||_||_||_||_|
</pre>

**Exemplo de saída**:
	
	123456789
	621943578
	/!\erro de formato/!\
	000000666
