# Repositório: docas-libs
## 📦 Docas Libs — O Porto do Ecossistema Scorpion

O **Docas Libs** é o ponto de partida para qualquer projeto utilizando a arquitetura Scorpion. Ele funciona como um **gerenciador de dependências leve**, responsável por orquestrar a instalação e atualização das bibliotecas modulares da linha JAPURA.

---

## 🏗️ Arquitetura Modular
Diferente de frameworks monolíticos, o Scorpion é dividido em módulos independentes. O **Docas Libs** é o "porto" onde esses módulos se encontram.

### Bibliotecas Oficiais:
* [🌿 CurupiraDoc](https://github.com/Snahar1/curupira-doc) - Documentação e Identidade Visual.
* [🔐 VeroEnv](https://github.com/Snahar1/vero-env) - Gestão de Ambiente e Segurança.
* [⚓ IcoaraciDB](https://github.com/Snahar1/icoaraci-db) - Persistência de Dados e Queries.
* [🌊 BanzeiroLogs](https://github.com/Snahar1/banzeiro-logs) - Sistema de Auditoria.

---

## 🚀 Como Iniciar

1. Certifique-se de ter a pasta `sys/` na raiz do seu projeto.
2. Crie um arquivo `docas.json` definindo quais módulos o seu projeto vai usar.

### Exemplo de `docas.json`:
```json
{
    "name": "MeuProjeto",
    "require": {
        "curupira-doc": "1.0.0",
        "vero-env": "1.0.0",
        "icoaraci-db": "1.0.0"
    }
}
