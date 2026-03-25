Descrição das principais classes
A arquitetura do sistema foi desenhada de forma orientada a objetos, com responsabilidades bem definidas para cada classe:

Database: Classe de configuração e infraestrutura. Utiliza o padrão Singleton com a biblioteca PDO para gerenciar 
e fornecer a conexão com o banco de dados. Garante que a aplicação abra apenas uma conexão por requisição, otimizando o desempenho.

Evento (Model): Responsável por gerenciar os dados dos eventos. Contém os métodos para realizar o CRUD (Criar, Ler, Atualizar e Deletar) de eventos,
manipulando propriedades importantes como o limite máximo de participantes (max_participantes), data, horário e local.

Participante (Model): Gerencia os dados das pessoas que utilizarão o sistema. Possui métodos para cadastrar, editar, excluir e listar os participantes,
validando informações como nome, e-mail e telefone.

Inscricao (Model): É a classe que concentra as regras de negócio mais rigorosas do sistema.
Ela resolve a relação de muitos-para-muitos entre eventos e participantes. Antes de efetivar uma inscrição no banco de dados,
esta classe executa métodos internos (verificarVagasDisponiveis e verificarDuplicidade) para garantir que o participante não se inscreva
duas vezes no mesmo evento e que o evento ainda tenha vagas disponíveis.

Controllers (EventoController, ParticipanteController, InscricaoController): São as classes de controle.
Cada entidade possui seu próprio Controller. O InscricaoController, por exemplo, é responsável por receber os IDs do participante
e do evento vindos da View, enviar para o Model Inscricao processar e retornar a mensagem de sucesso ou erro (ex: "Evento lotado") para ser exibida na tela.

_____________________________________

Explicação da estrutura MVC utilizada
O sistema foi desenvolvido utilizando o padrão de arquitetura MVC (Model-View-Controller).
O objetivo dessa escolha foi separar as responsabilidades da aplicação em três camadas distintas,
garantindo um código mais organizado, seguro e de fácil manutenção, sem a dependência de frameworks externos.

Model (Modelo): É o coração do sistema. Esta camada contém toda a lógica de negócios,
regras de validação e é a única responsável pela comunicação direta com o banco de dados MySQL via PDO.
É aqui que garantimos que um evento não ultrapasse o limite de vagas.

View (Visão): Representa a interface com o usuário (UI). É composta por arquivos HTML mesclados com PHP,
responsáveis exclusivamente por exibir os dados na tela (como as tabelas de listagem de eventos/participantes)
e apresentar os formulários de cadastro. A View não contém regras de negócio.

Controller (Controlador): Atua como o "maestro" do sistema. Ele intercepta as requisições do usuário 
(como o envio de um formulário ou um clique em um link), processa os dados de entrada, aciona os Models necessários
para realizar operações no banco de dados e, por fim, decide qual View será carregada para exibir a resposta ao usuário.
