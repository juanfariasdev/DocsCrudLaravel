# Sistema de Avaliação NPS - Checklist

#### Cadastro de Usuários
- [X] Implementar cadastro de usuários com os campos: Nome, Email, Senha, Rua, Número, Bairro, CEP, Cidade, Estado.
- [ ] Implementar autenticação com redes sociais (Google, Facebook).
- [ ] Implementar cadastro via aplicativo móvel com integração ao GPS.

#### Gestão de Papéis de Usuários
- [X] Configurar papéis de usuário: Admin, Empresa e Cliente.
- [ ] Definir permissões e acessos específicos para cada papel.

#### Cadastro e Gestão de Locais
- [ ] Implementar cadastro de locais com endereço, coordenadas geográficas e informações gerais.

#### Avaliação NPS
- [ ] Implementar sistema de avaliação de estrelas (1 a 5).
- [ ] Adicionar campo opcional para texto no feedback.
<!-- - [ ] Implementar upload de até 5 fotos por avaliação. Não necessário no momento-->
- [ ] Configurar limitação para permitir apenas uma avaliação por local por dia para cada cliente.
- [ ] Implementar verificação de geolocalização para permitir avaliações apenas dentro de 100 metros do local.
- [ ] Configurar tempo limite de 10 minutos para completar a avaliação após iniciá-la.

#### Geolocalização
- [ ] Implementar verificação da localização antes do início da avaliação.
- [ ] Configurar sistema de check-in para validar a presença no local.
- [ ] Definir tolerância de distância personalizada para diferentes locais.

#### Relatórios e Visualização de Dados
- [ ] Desenvolver dashboard dinâmico com gráficos e filtros (por dia, horário, tipo de serviço, etc).
- [ ] Implementar exportação de relatórios em Excel, CSV e PDF.
- [ ] Configurar relatórios programados para envio automático por email.

#### Histórico de Avaliações
- [ ] Criar registro de todas as avaliações feitas por clientes e locais.

#### Notificações e Lembretes
- [ ] Implementar notificações para clientes que iniciaram, mas não completaram a avaliação.
- [ ] Configurar sistema de gamificação para incentivar avaliações regulares.
- [ ] Desenvolver notificações inteligentes baseadas no comportamento e proximidade do cliente.

#### Gestão de Usuários
- [ ] Configurar papel de Super Admin para gerenciar múltiplas áreas administrativas.
- [ ] Implementar log de acessos e ações para auditoria.

#### Requisitos Não Funcionais
- [ ] Arquitetura baseada em microserviços para escalabilidade.
- [ ] Configurar CDN para armazenamento e distribuição de fotos.
- [ ] Implementar autenticação OAuth2 para segurança.
- [ ] Criptografar dados sensíveis.
- [ ] Configurar DLP para proteger dados confidenciais em exportações.
- [ ] Garantir alta disponibilidade (99.9%) e redundância de servidores.
- [ ] Implementar interface intuitiva e responsiva.
- [ ] Garantir conformidade com WCAG 2.1 para acessibilidade.
- [ ] Suporte multilíngue.

#### Regras de Negócio
- [ ] Implementar validação da localização (raio de 100 metros).
- [ ] Limitar avaliações para uma vez por dia por local.
- [ ] Configurar tempo de 10 minutos para conclusão da avaliação.
- [ ] Definir ponderação para avaliações com texto e fotos na média final.
- [ ] Desenvolver sistema de detecção de avaliações fraudulentas.
- [ ] Configurar opção de avaliações anônimas.

#### Considerações Finais
- [ ] Verificar se o sistema é seguro, escalável e orientado à experiência do usuário.
