# 🦂 IcoaraciDB — Gerenciador Universal de Banco de Dados

O **IcoaraciDB** é um motor de abstração de banco de dados (DBAL) ultra-leve e expansível, desenvolvido para o ecossistema **Scorpion**. Ele foi projetado para permitir que o desenvolvedor alterne entre diferentes tipos de bancos de dados (SQL e NoSQL) sem alterar a lógica da aplicação.

---

## 🚀 Superpoderes

* **Multi-Driver:** Suporte nativo para MySQL (via PDO) e preparado para expansão (MongoDB, PostgreSQL, SQLite).
* **Query Builder:** Escreva consultas complexas usando métodos encadeados em PHP, sem a necessidade de escrever SQL manualmente.
* **Integração Nativa Docas:** Totalmente compatível com o gerenciador de dependências Docas.
* **Arquitetura MVC:** Pronto para ser injetado no `Core\Model` de qualquer sistema.

---

## 📦 Instalação via Docas

Adicione o requisito ao seu arquivo `docas.json` local:

```json
"require": {
    "snahar/icoaraci-db": "1.0.0"
}
