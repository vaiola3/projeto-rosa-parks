# projeto_rosaParks
Uma aplicação web para controle de frequência de alunos.

Como professor voluntário em Cursinhos Populares notei que o controle da frequência dos alunos é uma necessidade inegável, quero dizer, para uma melhor gestão e controle existe a necessidade de se ter informações quanto a frequência de cada aluno, seja para um melhor planejamento de curto prazo ou de longo prazo.

Ocorre que os professores geralmente dão aulas partilhadas (uma mesma disciplina é ministrada por mais de uma pessoa), dão aulas com intervalos de ocorrência por vezes longos e muitas vezes acabam esquecendo de realizar a "chamada" convencional o que gera um controle impreciso da frequência dos alunos.

Pensando na necessidade da facilitação do apontamento de presença dos alunos idealizei esse projeto para que haja um melhor controle da frequencia dos alunos por meio de uma Aplicação Web onde, realizando um login, os professores tenham acesso a uma lista de alunos e possam marcar a presensa deles e registrar as participações em aula ocorridas durante o dia.

Tendo esses registros outras informações obtidas durante o período letivo podem ser tratadas para fins de melhoria sejam do planejamento das aulas seja para organização do período letivo em si.

# estrutura da aplicação
Idealizei essa aplicação web na arquitetura MVC (Model, View e Controller) para uma melhor organização dos arquivos, rotinas e tratamentos de requisições. O intuíto do projeto é ter uma aplicação leve, robusta e de fácil interação, quero dizer, o usuário vai poder logar nela pelo próprio celular e apontar os alunos que estão presentes em sala de aula, enviando todos os dados para um banco de dados.

Não pretendo utilizar frameworks como Laravel por exemplo pois a ideia é subir essa aplicação em host gratuito por exemplo, com limitações. A aplicação pode ser acessada em: <https://pereira01200419.000webhostapp.com/>

Usuários ADMINISTRADOR vão poder consultar relatórios detalhados sobre frequência de alunos, participações em disciplinas e informação de aulas dadas, vão poder também ter a possibilidade de exportar as informações do banco de dados e de cadastrar ou remover usuários.

Usuários PROFESSOR vão ter um acesso limitado as informações de aulas dadas tendo restrição as suas disciplinas e usuarios ALUNO vão poder ter acesso a informações de suas próprias frequencias e aulas frequentadas.
