#include <stdio.h> //lib: importar fun��es printf e scanf
#include <locale.h> //lib: formatar textos em utf-8
#include <string.h> //lib: importar fun��es para trabalhar com strings
#include <stdlib.h> //lib: importar a fun��o de limpar a tela
#include <ctype.h> //lib: importar fun��o toupper
#include <ctype.h>  //lib

/* Declara��o dos structs, v�o facilitar a manipula��o dos Admins e das Obras do sistema. */
struct Admin {
	char usuario[20];
	char senha[10];
};

struct Obra {
	char categoria[15];
	char titulo[40];
	char sinopse[200];
	char autor[20];
	char comentario[200];
	float avaliacao;
};

/* Declara��o das vari�veis principais do Projeto */
int qntAdmins = 2, qntObras = 10, opcaoDigitada = 0;

bool isAutenticado = false;
struct Admin admins[2], adminLogado;
struct Obra obras[10];

/*  Declara��o das fun��es que criamos no Projeto. 
	O intuito das fun��es � a fragmenta��o do c�digo, tornando mais organizado e gerando uma
	melhor difus�o das tarefas.
 */
void getCabecalhoById(int cabecalhoId);
void exibirPainelAdministrativo();
void listarObras();
void exibirRelatorio();
bool autenticar();

/* Fun��o principal */
int main() {
	setlocale(LC_ALL, "Portuguese");
	
	int opcaoPrincipal = 0;
	
	while(opcaoPrincipal != 9) {
		do {
			getCabecalhoById(1); // Chamando a fun��o que criamos, passando o par�metro Id.
			printf("Selecione uma das op��es: ");
			scanf("%d", &opcaoPrincipal);
		} while((opcaoPrincipal != 1) && (opcaoPrincipal != 2) && (opcaoPrincipal != 3) && (opcaoPrincipal != 9));
		
		switch(opcaoPrincipal) {
			case 1:
				// Painel Administrativo
				do {
					getCabecalhoById(2); // Chamando a fun��o que criamos, passando o par�metro Id.
					printf("Selecione uma das op��es: ");
					scanf("%d", &opcaoDigitada);
				} while((opcaoDigitada != 1) && (opcaoDigitada != 2));
				
				if(opcaoDigitada == 1){
					// Autentica��o dos Admins
					
					do{
						getCabecalhoById(3); // Chamando a fun��o que criamos, passando o par�metro Id.
						printf("� Informe seu Usu�rio: ");
						scanf("%s", &adminLogado.usuario);
						printf("� %s, informe sua Senha: ", adminLogado.usuario);
						scanf("%s", &adminLogado.senha);
						
						isAutenticado = autenticar(); // Chamando a fun��o de autentica��o, que retorna um valoor booleano (true/false)
						
						if(!isAutenticado) {
							adminLogado.usuario[strlen(adminLogado.usuario) - 1] = '\0';
							adminLogado.senha[strlen(adminLogado.senha) - 1] = '\0';
							system("cls");	
							printf("\n\n**FALHA** � As credenciais s�o inv�lidas, tente novamente!\n\n");
							system("pause");
							system("cls");
						}
					}while(!isAutenticado);
					
					if(isAutenticado){
						exibirPainelAdministrativo(); // Chamando a fun��o
					}
				}else{
					// Cadastro dos Admins
					
					getCabecalhoById(4); // Chamando a fun��o que criamos, passando o par�metro Id.
					
					bool temVagaAdmin = false;
					
					/*  Verificamos se h� espa�o (na mem�ria) para registrar mais um Admin.
						A verifica��o ocorre atrav�s do "length" da string "usuario", 
						caso o "length" seja IGUAL a 0 significa que est� dispon�vel. 
					 */
					for(int i = 0; i < qntAdmins; i++) {
						if(strlen(admins[i].usuario) == 0){ // Verifica��o pelo "length" atrav�s da fun��o "strlen"
							do{
								printf("� Qual o Nome de Usu�rio? ");
								scanf("%s", admins[i].usuario);
							} while(strlen(admins[i].usuario) == 0);
							
							do{
								printf("� Ol� %s, qual ser� sua senha? ", admins[i].usuario);
								scanf("%s", admins[i].senha);
							} while(strlen(admins[i].senha) == 0);		
							temVagaAdmin = true;
							adminLogado = admins[i];
							break;
						}
					}
		
					system("cls");			
					
					if(temVagaAdmin){
						isAutenticado = true;
						exibirPainelAdministrativo();
					}else{
						printf("� A Equipe Administrativa est� cheia!");
						system("pause");	
					}
				}
				break;
				case 2:
					// Lista todas as Obras cadastradas
					getCabecalhoById(7); // Chamando a fun��o que criamos, passando o par�metro Id.
					break;
				case 3:
					// Exibe o relat�rio das Obras
					getCabecalhoById(9); // Chamando a fun��o que criamos, passando o par�metro Id.
					break;
				case 9:
					// Sair da CulturaWeb
					getCabecalhoById(8); // Chamando a fun��o que criamos, passando o par�metro Id.
					break;
				default:
					printf("Desconhecido...");
		}		
	}
	return 0;
}

/* Fun��o respons�vel por mostrar o Menu do Painel Administrativo */
void exibirPainelAdministrativo() {
	while(isAutenticado){ //Caso ele j� esteja logado (por exemplo: ap�s registrar uma obra)
		do {
			getCabecalhoById(5); // Chamando a fun��o que criamos, passando o par�metro Id.
			printf("Selecione uma das op��es: ");
			scanf("%d", &opcaoDigitada);
		} while((opcaoDigitada != 1) && (opcaoDigitada != 2));
		
		if(opcaoDigitada == 1) {
			// Cadastrar uma obra
			bool temEspacoObra = false;
			for(int i = 0; i < qntObras; i++) {
				if(strlen(obras[i].titulo) == 0){
					do{
						printf("� Categorias dispon�veis: Filme, Serie ou Livro.\n");
						printf("� Qual a categoria da Obra? ");
						scanf("%s", &obras[i].categoria);
						fflush(stdin);
					} while((strcmp(obras[i].categoria, "Filme") != 0) && (strcmp(obras[i].categoria, "Serie") != 0) && (strcmp(obras[i].categoria, "Livro") != 0)  );
					
					do{
						printf("� Qual o T�tulo do %s? ", obras[i].categoria);
						fgets(obras[i].titulo, 40, stdin);
						fflush(stdin);
						obras[i].titulo[strlen(obras[i].titulo) - 1] = '\0';
					} while(strlen(obras[i].titulo) == 0);
					
					do{
						printf("� Qual a Sinopse do(a) %s '%s'? ", obras[i].categoria, obras[i].titulo);
						fgets(obras[i].sinopse, 200, stdin);
						fflush(stdin);
						obras[i].sinopse[strlen(obras[i].sinopse) - 1] = '\0';
					} while((strlen(obras[i].sinopse) == 0) || (strlen(obras[i].sinopse) > 200));
						
					do{
						printf("� Qual o Autor do(a) %s '%s'? ", obras[i].categoria, obras[i].titulo);
						fgets(obras[i].autor, 20, stdin);
						fflush(stdin);
						obras[i].autor[strlen(obras[i].autor) - 1] = '\0';
					} while((strlen(obras[i].autor) == 0) || (strlen(obras[i].autor) > 20));
					
					do{
						printf("� Qual seu coment�rio do(a) %s '%s'? ", obras[i].categoria, obras[i].titulo);
						fgets(obras[i].comentario, 200, stdin);
						fflush(stdin);
						obras[i].comentario[strlen(obras[i].comentario) - 1] = '\0';
					} while((strlen(obras[i].comentario) == 0) || (strlen(obras[i].comentario) > 100));
					
					do{
						printf("� Qual sua Avalia��o, de 0 a 5, pro(a) %s '%s'? ", obras[i].categoria, obras[i].titulo);
						scanf("%f", &obras[i].avaliacao);
					} while((obras[i].avaliacao < 0) || (obras[i].avaliacao > 5));
					
					system("cls");
					printf("\nSUCESSO � Obra cadastrada: ");
					
					printf("\n\nCategoria: %s\n", obras[i].categoria);	
					printf("T�tulo: %s\n", obras[i].titulo);
					printf("Sinopse: %s\n", obras[i].sinopse);
					printf("Autor: %s\n", obras[i].autor);
					printf("Coment�rio: %s\n", obras[i].comentario);
					printf("Avalia��o: %.1f\n\n", obras[i].avaliacao);
					
					system("pause");
						
					temEspacoObra = true;
					break;
				}
			}
			
			if(!temEspacoObra) {
				printf("\n\n� ERRO: O Banco de Dados das Obras est� cheio!\n\n");
				system("pause");
			}
		}else{
			// Logout do Painel Administrativo
			adminLogado.usuario[strlen(adminLogado.usuario) - 1] = '\0';
			adminLogado.senha[strlen(adminLogado.senha) - 1] = '\0';
			isAutenticado = false;
			getCabecalhoById(6); // Chamando a fun��o que criamos, passando o par�metro Id.
			system("pause");
		}
	}	
}

/*  Fun��o respons�vel pela autentica��o do usu�rio, com um retorno booleano. */
bool autenticar() {
	for(int i = 0; i < qntAdmins; i++){
		// Verificando se o Usu�rio e a Senha s�o compat�veis com algum Usu�rio da mem�ria.
		if((strcmp(admins[i].usuario, adminLogado.usuario) == 0) && (strcmp(admins[i].senha, adminLogado.senha) == 0)){
			if((strlen(admins[i].usuario) == 0) || (strlen(admins[i].senha) == 0)){
				return false;	
			}else{
				return true;
			}
		}
	}
	return false;
}

/*  Fun��o respons�vel por retornar um grupo de printf.
	Sempre deve ser informado o Id do cabe�alho.
 */
void getCabecalhoById(int cabecalhoId) {
	system("cls");
	switch(cabecalhoId) {
		case 1:
			printf("\n\n============== SEJA BEM-VINDO � CulturaWeb ==============\n\n");
			printf("� O que voc� deseja fazer? \n\n");
			printf("[1] � Acessar o Painel Administrativo\n");
			printf("[2] � Visualizar as Obras avaliadas\n");
			printf("[3] � Relat�rio da CulturaWeb\n");
			printf("[9] � Sair da CulturaWeb");
			printf("\n\n============== SEJA BEM-VINDO � CulturaWeb ==============\n\n");
			break;
		case 2:
			printf("\n\n============== PAINEL ADMINISTRATIVO ==============\n\n");
			printf("� O que voc� deseja fazer? \n\n");
			printf("[1] � Desejo Autenticar\n");
			printf("[2] � Desejo Cadastrar");
			printf("\n\n============== PAINEL ADMINISTRATIVO ==============\n\n");
			break;
		case 3:
			printf("\n\n============== AUTENTICA��O ==============\n\n");
			printf("� Voc� dever� fornecer um Nome de Usu�rio e uma Senha v�lidos para proceder.");
			printf("\n\n============== AUTENTICA��O ==============\n\n");
			break;
		case 4:
			printf("\n\n============== CADASTRO ==============\n\n");
			printf("� Voc� dever� fornecer um Nome de Usu�rio e uma Senha para proceder.");
			printf("\n\n============== CADASTRO ==============\n\n");
			break;
		case 5:
			printf("\n\n============== PAINEL ADMINISTRATIVO ==============\n\n");
			printf("� Ol� %s, seja bem-vindo ao Painel Administrativo da CulturaWeb!\n\n", adminLogado.usuario);
			printf("� O que voc� deseja fazer?\n\n");
			printf("[1] � Cadastrar uma Obra.\n");
			printf("[2] � Sair do Painel.");
			printf("\n\n============== PAINEL ADMINISTRATIVO ==============\n\n");
			break;
		case 6:
			printf("\n\n============== VOLTE SEMPRE � CULTURAWEB ==============\n\n");
			printf("� Voc� saiu do Painel Administrativo!");					
			printf("\n\n============== VOLTE SEMPRE � CULTURAWEB ==============\n\n");
			break;
		case 7:
			printf("\n\n============== OBRAS AVALIADAS ==============\n");
			listarObras(); // Chamando a fun��o
			printf("\n\n============== OBRAS AVALIADAS ==============\n\n");
			system("pause");
			break;
		case 8:
			printf("\n\n============== VOLTE SEMPRE � CULTURAWEB ==============\n\n");
			printf("� Aaaah, que pena! Voc� j� vai?!\n");					
			printf("� Espero que tenha encontrado o que procurava!\n");
			printf("� Sentiremos saudades, amigx!\n");
			printf("\n\n============== VOLTE SEMPRE � CULTURAWEB ==============\n\n");
			break;
		case 9:
			printf("\n\n============== RELAT�RIO CULTURAWEB ==============\n\n");
			exibirRelatorio();
			printf("\n\n============== RELAT�RIO CULTURAWEB ==============\n\n");
			system("pause");
			break;
		default:
			printf("� ERRO: Id Cabe�alho desconhecido!!!");
	}
}

/* Fun��o respons�vel por exibir o relat�rio geral do Sistema. */
void exibirRelatorio() {
	int adminsRegistrados = 0, obrasRegistradas = 0;
	for(int i = 0; i < qntAdmins; i++){
		if(!(strlen(admins[i].usuario) == 0) && !(strlen(admins[i].senha) == 0))
			adminsRegistrados++;
	}
	
	for(int i = 0; i < qntObras; i++){
		if(!strlen(obras[i].titulo) == 0)
			obrasRegistradas++;
	}
	
	
	printf("� Administradores registrados: %d/%d \n", adminsRegistrados, qntAdmins);
	printf("� Obras registradas: %d/%d", obrasRegistradas, qntObras);
}

/* Fun��o respons�vel por listar todas as Obras cadastras do sistema. */
void listarObras() {
	for(int i = 0; i < qntObras; i++) {
		if(strlen(obras[i].titulo) != 0) { /* Verifico se a Obra existe atrav�s do "length" da String Titulo com a fun��o "strlen" */
			printf("\n\nT�tulo (%s): %s\n", obras[i].categoria, obras[i].titulo);
			printf("Sinopse: %s\n", obras[i].sinopse);
			printf("Autor: %s\n", obras[i].autor);
			printf("Coment�rio: %s\n", obras[i].comentario);
			printf("Avalia��o: %.1f", obras[i].avaliacao);
		}	
	}
}


