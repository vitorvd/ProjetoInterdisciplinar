#include <stdio.h> //lib: importar funções printf e scanf
#include <locale.h> //lib: formatar textos em utf-8
#include <string.h> //lib: importar funções para trabalhar com strings
#include <stdlib.h> //lib: importar a função de limpar a tela
#include <ctype.h> //lib: importar função toupper
#include <ctype.h>  //lib

/* Declaração dos structs, vão facilitar a manipulação dos Admins e das Obras do sistema. */
struct Admin {
	char usuario[20];
	char senha[10];
	char dataRegistro[]; //no C não existe o campo DateTime
	char dataUltimaSaida[]; //no C não existe o campo DateTime
};

struct Obra {
	char categoria[15];
	char titulo[40];
	char sinopse[200];
	char autor[20];
	char comentario[200];
	float avaliacao;
};

/* Declaração das variáveis principais do Projeto */
int qntAdmins = 2, qntObras = 10, opcaoDigitada = 0;

bool isAutenticado = false;
struct Admin admins[2], adminLogado;
struct Obra obras[10];

/*  Declaração das funções que criamos no Projeto. 
	O intuito das funções é a fragmentação do código, tornando mais organizado e gerando uma
	melhor difusão das tarefas.
 */
void getCabecalhoById(int cabecalhoId);
void exibirPainelAdministrativo();
void listarObras();
void exibirRelatorio();
bool autenticar();

/* Função principal */
int main() {
	setlocale(LC_ALL, "Portuguese");
	
	int opcaoPrincipal = 0;
	
	while(opcaoPrincipal != 9) {
		do {
			getCabecalhoById(1); // Chamando a função que criamos, passando o parâmetro Id.
			printf("Selecione uma das opções: ");
			scanf("%d", &opcaoPrincipal);
		} while((opcaoPrincipal != 1) && (opcaoPrincipal != 2) && (opcaoPrincipal != 3) && (opcaoPrincipal != 9));
		
		switch(opcaoPrincipal) {
			case 1:
				// Painel Administrativo
				do {
					getCabecalhoById(2); // Chamando a função que criamos, passando o parâmetro Id.
					printf("Selecione uma das opções: ");
					scanf("%d", &opcaoDigitada);
				} while((opcaoDigitada != 1) && (opcaoDigitada != 2));
				
				if(opcaoDigitada == 1){
					// Autenticação dos Admins
					
					do{
						getCabecalhoById(3); // Chamando a função que criamos, passando o parâmetro Id.
						printf("» Informe seu Usuário: ");
						scanf("%s", &adminLogado.usuario);
						printf("» %s, informe sua Senha: ", adminLogado.usuario);
						scanf("%s", &adminLogado.senha);
						
						isAutenticado = autenticar(); // Chamando a função de autenticação, que retorna um valoor booleano (true/false)
						
						if(!isAutenticado) {
							adminLogado.usuario[strlen(adminLogado.usuario) - 1] = '\0';
							adminLogado.senha[strlen(adminLogado.senha) - 1] = '\0';
							system("cls");	
							printf("\n\n**FALHA** » As credenciais são inválidas, tente novamente!\n\n");
							system("pause");
							system("cls");
						}
					}while(!isAutenticado);
					
					if(isAutenticado){
						exibirPainelAdministrativo(); // Chamando a função
					}
				}else{
					// Cadastro dos Admins
					
					getCabecalhoById(4); // Chamando a função que criamos, passando o parâmetro Id.
					
					bool temVagaAdmin = false;
					
					/*  Verificamos se há espaço (na memória) para registrar mais um Admin.
						A verificação ocorre através do "length" da string "usuario", 
						caso o "length" seja IGUAL a 0 significa que está disponível. 
					 */
					for(int i = 0; i < qntAdmins; i++) {
						if(strlen(admins[i].usuario) == 0){ // Verificação pelo "length" através da função "strlen"
							do{
								printf("» Qual o Nome de Usuário? ");
								scanf("%s", admins[i].usuario);
							} while(strlen(admins[i].usuario) == 0);
							
							do{
								printf("» Olá %s, qual será sua senha? ", admins[i].usuario);
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
						printf("» A Equipe Administrativa está cheia!");
						system("pause");	
					}
				}
				break;
				case 2:
					// Lista todas as Obras cadastradas
					getCabecalhoById(7); // Chamando a função que criamos, passando o parâmetro Id.
					break;
				case 3:
					// Exibe o relatório das Obras
					getCabecalhoById(9); // Chamando a função que criamos, passando o parâmetro Id.
					break;
				case 9:
					// Sair da CulturaWeb
					getCabecalhoById(8); // Chamando a função que criamos, passando o parâmetro Id.
					break;
				default:
					printf("Desconhecido...");
		}		
	}
	return 0;
}

/* Função responsável por mostrar o Menu do Painel Administrativo */
void exibirPainelAdministrativo() {
	while(isAutenticado){ //Caso ele já esteja logado (por exemplo: após registrar uma obra)
		do {
			getCabecalhoById(5); // Chamando a função que criamos, passando o parâmetro Id.
			printf("Selecione uma das opções: ");
			scanf("%d", &opcaoDigitada);
		} while((opcaoDigitada != 1) && (opcaoDigitada != 2));
		
		if(opcaoDigitada == 1) {
			// Cadastrar uma obra
			bool temEspacoObra = false;
			for(int i = 0; i < qntObras; i++) {
				if(strlen(obras[i].titulo) == 0){
					do{
						printf("» Categorias disponíveis: Filme, Serie ou Livro.\n");
						printf("» Qual a categoria da Obra? ");
						scanf("%s", &obras[i].categoria);
						fflush(stdin);
					} while((strcmp(obras[i].categoria, "Filme") != 0) && (strcmp(obras[i].categoria, "Serie") != 0) && (strcmp(obras[i].categoria, "Livro") != 0)  );
					
					do{
						printf("» Qual o Título do %s? ", obras[i].categoria);
						fgets(obras[i].titulo, 40, stdin);
						fflush(stdin);
						obras[i].titulo[strlen(obras[i].titulo) - 1] = '\0';
					} while(strlen(obras[i].titulo) == 0);
					
					do{
						printf("» Qual a Sinopse do(a) %s '%s'? ", obras[i].categoria, obras[i].titulo);
						fgets(obras[i].sinopse, 200, stdin);
						fflush(stdin);
						obras[i].sinopse[strlen(obras[i].sinopse) - 1] = '\0';
					} while((strlen(obras[i].sinopse) == 0) || (strlen(obras[i].sinopse) > 200));
						
					do{
						printf("» Qual o Autor do(a) %s '%s'? ", obras[i].categoria, obras[i].titulo);
						fgets(obras[i].autor, 20, stdin);
						fflush(stdin);
						obras[i].autor[strlen(obras[i].autor) - 1] = '\0';
					} while((strlen(obras[i].autor) == 0) || (strlen(obras[i].autor) > 20));
					
					do{
						printf("» Qual seu comentário do(a) %s '%s'? ", obras[i].categoria, obras[i].titulo);
						fgets(obras[i].comentario, 200, stdin);
						fflush(stdin);
						obras[i].comentario[strlen(obras[i].comentario) - 1] = '\0';
					} while((strlen(obras[i].comentario) == 0) || (strlen(obras[i].comentario) > 100));
					
					do{
						printf("» Qual sua Avaliação, de 0 a 5, pro(a) %s '%s'? ", obras[i].categoria, obras[i].titulo);
						scanf("%f", &obras[i].avaliacao);
					} while((obras[i].avaliacao < 0) || (obras[i].avaliacao > 5));
					
					system("cls");
					printf("\nSUCESSO » Obra cadastrada: ");
					
					printf("\n\nCategoria: %s\n", obras[i].categoria);	
					printf("Título: %s\n", obras[i].titulo);
					printf("Sinopse: %s\n", obras[i].sinopse);
					printf("Autor: %s\n", obras[i].autor);
					printf("Comentário: %s\n", obras[i].comentario);
					printf("Avaliação: %.1f\n\n", obras[i].avaliacao);
					
					system("pause");
						
					temEspacoObra = true;
					break;
				}
			}
			
			if(!temEspacoObra) {
				printf("\n\n» ERRO: O Banco de Dados das Obras está cheio!\n\n");
				system("pause");
			}
		}else{
			// Logout do Painel Administrativo
			adminLogado.usuario[strlen(adminLogado.usuario) - 1] = '\0';
			adminLogado.senha[strlen(adminLogado.senha) - 1] = '\0';
			isAutenticado = false;
			getCabecalhoById(6); // Chamando a função que criamos, passando o parâmetro Id.
			system("pause");
		}
	}	
}

/*  Função responsável pela autenticação do usuário, com um retorno booleano. */
bool autenticar() {
	for(int i = 0; i < qntAdmins; i++){
		// Verificando se o Usuário e a Senha são compatíveis com algum Usuário da memória.
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

/*  Função responsável por retornar um grupo de printf.
	Sempre deve ser informado o Id do cabeçalho.
 */
void getCabecalhoById(int cabecalhoId) {
	system("cls");
	switch(cabecalhoId) {
		case 1:
			printf("\n\n============== SEJA BEM-VINDO À CulturaWeb ==============\n\n");
			printf("» O que você deseja fazer? \n\n");
			printf("[1] » Acessar o Painel Administrativo\n");
			printf("[2] » Visualizar as Obras avaliadas\n");
			printf("[3] » Relatório da CulturaWeb\n");
			printf("[9] » Sair da CulturaWeb");
			printf("\n\n============== SEJA BEM-VINDO À CulturaWeb ==============\n\n");
			break;
		case 2:
			printf("\n\n============== PAINEL ADMINISTRATIVO ==============\n\n");
			printf("» O que você deseja fazer? \n\n");
			printf("[1] » Desejo Autenticar\n");
			printf("[2] » Desejo Cadastrar");
			printf("\n\n============== PAINEL ADMINISTRATIVO ==============\n\n");
			break;
		case 3:
			printf("\n\n============== AUTENTICAÇÃO ==============\n\n");
			printf("» Você deverá fornecer um Nome de Usuário e uma Senha válidos para proceder.");
			printf("\n\n============== AUTENTICAÇÃO ==============\n\n");
			break;
		case 4:
			printf("\n\n============== CADASTRO ==============\n\n");
			printf("» Você deverá fornecer um Nome de Usuário e uma Senha para proceder.");
			printf("\n\n============== CADASTRO ==============\n\n");
			break;
		case 5:
			printf("\n\n============== PAINEL ADMINISTRATIVO ==============\n\n");
			printf("» Olá %s, seja bem-vindo ao Painel Administrativo da CulturaWeb!\n\n", adminLogado.usuario);
			printf("» O que você deseja fazer?\n\n");
			printf("[1] » Cadastrar uma Obra.\n");
			printf("[2] » Sair do Painel.");
			printf("\n\n============== PAINEL ADMINISTRATIVO ==============\n\n");
			break;
		case 6:
			printf("\n\n============== VOLTE SEMPRE À CULTURAWEB ==============\n\n");
			printf("» Você saiu do Painel Administrativo!");					
			printf("\n\n============== VOLTE SEMPRE À CULTURAWEB ==============\n\n");
			break;
		case 7:
			printf("\n\n============== OBRAS AVALIADAS ==============\n");
			listarObras(); // Chamando a função
			printf("\n\n============== OBRAS AVALIADAS ==============\n\n");
			system("pause");
			break;
		case 8:
			printf("\n\n============== VOLTE SEMPRE À CULTURAWEB ==============\n\n");
			printf("» Aaaah, que pena! Você já vai?!\n");					
			printf("» Espero que tenha encontrado o que procurava!\n");
			printf("» Sentiremos saudades, amigx!\n");
			printf("\n\n============== VOLTE SEMPRE À CULTURAWEB ==============\n\n");
			break;
		case 9:
			printf("\n\n============== RELATÓRIO CULTURAWEB ==============\n\n");
			exibirRelatorio();
			printf("\n\n============== RELATÓRIO CULTURAWEB ==============\n\n");
			system("pause");
			break;
		default:
			printf("» ERRO: Id Cabeçalho desconhecido!!!");
	}
}

/* Função responsável por exibir o relatório geral do Sistema. */
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
	
	
	printf("» Administradores registrados: %d/%d \n", adminsRegistrados, qntAdmins);
	printf("» Obras registradas: %d/%d", obrasRegistradas, qntObras);
}

/* Função responsável por listar todas as Obras cadastras do sistema. */
void listarObras() {
	for(int i = 0; i < qntObras; i++) {
		if(strlen(obras[i].titulo) != 0) { /* Verifico se a Obra existe através do "length" da String Titulo com a função "strlen" */
			printf("\n\nTítulo (%s): %s\n", obras[i].categoria, obras[i].titulo);
			printf("Sinopse: %s\n", obras[i].sinopse);
			printf("Autor: %s\n", obras[i].autor);
			printf("Comentário: %s\n", obras[i].comentario);
			printf("Avaliação: %.1f", obras[i].avaliacao);
		}	
	}
}

