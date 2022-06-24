using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

#nullable disable

namespace MultiplaEscolhaEdu.Dao.Models
{
    public partial class MultiplaEscolhaEduContext : DbContext
    {
        public MultiplaEscolhaEduContext()
        {
        }

        public MultiplaEscolhaEduContext(DbContextOptions<MultiplaEscolhaEduContext> options)
            : base(options)
        {
        }

        public virtual DbSet<Aluno> Alunos { get; set; }
        public virtual DbSet<CategoriaCurso> CategoriaCursos { get; set; }
        public virtual DbSet<Curso> Cursos { get; set; }
        public virtual DbSet<Empresa> Empresas { get; set; }
        public virtual DbSet<Logusuario> Logusuarios { get; set; }
        public virtual DbSet<Matricula> Matriculas { get; set; }
        public virtual DbSet<Parceiro> Parceiros { get; set; }
        public virtual DbSet<Usuario> Usuarios { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
#warning To protect potentially sensitive information in your connection string, you should move it out of source code. You can avoid scaffolding the connection string by using the Name= syntax to read it from configuration - see https://go.microsoft.com/fwlink/?linkid=2131148. For more guidance on storing connection strings, see http://go.microsoft.com/fwlink/?LinkId=723263.
                optionsBuilder.UseMySql("server=andersondomingos.eti.br;database=multiplaescolhaedu;uid=multiplaescolhaedu;pwd=Afd@1984", Microsoft.EntityFrameworkCore.ServerVersion.Parse("10.3.34-mariadb"));
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.HasCharSet("utf8")
                .UseCollation("utf8_general_ci");

            modelBuilder.Entity<Aluno>(entity =>
            {
                entity.ToTable("alunos");

                entity.HasCharSet("utf8mb4")
                    .UseCollation("utf8mb4_general_ci");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .HasColumnName("id");

                entity.Property(e => e.Bairro)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("bairro");

                entity.Property(e => e.Cep)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("cep");

                entity.Property(e => e.Cidade)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("cidade");

                entity.Property(e => e.Complemento)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("complemento");

                entity.Property(e => e.Cpf)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("cpf");

                entity.Property(e => e.DataCadastro)
                    .HasColumnType("datetime")
                    .HasColumnName("data_cadastro");

                entity.Property(e => e.DataNascimento)
                    .HasColumnType("date")
                    .HasColumnName("data_nascimento");

                entity.Property(e => e.Email)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("email");

                entity.Property(e => e.Estado)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("estado");

                entity.Property(e => e.Investimento)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("investimento");

                entity.Property(e => e.Logradouro)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("logradouro");

                entity.Property(e => e.MelhorDataPagamento)
                    .HasColumnType("int(11)")
                    .HasColumnName("melhor_data_pagamento");

                entity.Property(e => e.Nome)
                    .HasMaxLength(200)
                    .HasColumnName("nome");

                entity.Property(e => e.Rg)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("rg");

                entity.Property(e => e.SlugCurso)
                    .HasMaxLength(100)
                    .HasColumnName("slug_curso");

                entity.Property(e => e.SlugUnidade)
                    .HasMaxLength(100)
                    .HasColumnName("slug_unidade");

                entity.Property(e => e.UltimaAtualizacao)
                    .HasColumnType("timestamp")
                    .HasColumnName("ultima_atualizacao")
                    .HasDefaultValueSql("current_timestamp()");

                entity.Property(e => e.Whatsapp)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("whatsapp");
            });

            modelBuilder.Entity<CategoriaCurso>(entity =>
            {
                entity.ToTable("categoria_cursos");

                entity.HasCharSet("utf8mb4")
                    .UseCollation("utf8mb4_general_ci");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .HasColumnName("id");

                entity.Property(e => e.DataCadastro)
                    .HasColumnType("datetime")
                    .HasColumnName("data_cadastro");

                entity.Property(e => e.Descricao)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("descricao");

                entity.Property(e => e.UltimaAtualizacao)
                    .HasColumnType("timestamp")
                    .HasColumnName("ultima_atualizacao")
                    .HasDefaultValueSql("current_timestamp()");
            });

            modelBuilder.Entity<Curso>(entity =>
            {
                entity.ToTable("cursos");

                entity.HasCharSet("utf8mb4")
                    .UseCollation("utf8mb4_general_ci");

                entity.HasIndex(e => e.IdCategoriaCurso, "id_categoria_curso");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .HasColumnName("id");

                entity.Property(e => e.DataCadastro)
                    .HasColumnType("datetime")
                    .HasColumnName("data_cadastro");

                entity.Property(e => e.Descricao)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("descricao");

                entity.Property(e => e.IdCategoriaCurso)
                    .HasColumnType("int(11)")
                    .HasColumnName("id_categoria_curso");

                entity.Property(e => e.Slug)
                    .HasMaxLength(100)
                    .HasColumnName("slug");

                entity.Property(e => e.UltimaAtualizacao)
                    .HasColumnType("timestamp")
                    .HasColumnName("ultima_atualizacao")
                    .HasDefaultValueSql("current_timestamp()");

                entity.Property(e => e.Valor)
                    .HasPrecision(14, 2)
                    .HasColumnName("valor");

                entity.HasOne(d => d.IdCategoriaCursoNavigation)
                    .WithMany(p => p.Cursos)
                    .HasForeignKey(d => d.IdCategoriaCurso)
                    .HasConstraintName("cursos_ibfk_1");
            });

            modelBuilder.Entity<Empresa>(entity =>
            {
                entity.ToTable("empresa");

                entity.HasCharSet("utf8mb4")
                    .UseCollation("utf8mb4_general_ci");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .HasColumnName("id");

                entity.Property(e => e.Bairro)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("bairro");

                entity.Property(e => e.Celular)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("celular");

                entity.Property(e => e.Cep)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("cep");

                entity.Property(e => e.Cidade)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("cidade");

                entity.Property(e => e.Cnpj)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("cnpj");

                entity.Property(e => e.Complemento)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("complemento");

                entity.Property(e => e.DataCadastro)
                    .HasColumnType("datetime")
                    .HasColumnName("data_cadastro");

                entity.Property(e => e.Email)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("email");

                entity.Property(e => e.Estado)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("estado");

                entity.Property(e => e.InscricaoEstadual)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("inscricao_estadual");

                entity.Property(e => e.Logradouro)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("logradouro");

                entity.Property(e => e.NomeFantasia)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("nome_fantasia");

                entity.Property(e => e.Numero)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("numero");

                entity.Property(e => e.RazaoSocial)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("razao_social");

                entity.Property(e => e.Telefone)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("telefone");

                entity.Property(e => e.UltimaAtualizacao)
                    .HasColumnType("datetime")
                    .HasColumnName("ultima_atualizacao");
            });

            modelBuilder.Entity<Logusuario>(entity =>
            {
                entity.ToTable("logusuarios");

                entity.HasCharSet("utf8mb4")
                    .UseCollation("utf8mb4_general_ci");

                entity.HasIndex(e => e.IdUsuario, "id_usuario");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .HasColumnName("id");

                entity.Property(e => e.DataLog)
                    .HasColumnType("datetime")
                    .HasColumnName("data_log");

                entity.Property(e => e.Descricao)
                    .IsRequired()
                    .HasColumnName("descricao");

                entity.Property(e => e.IdUsuario)
                    .HasColumnType("int(11)")
                    .HasColumnName("id_usuario");

                entity.Property(e => e.IpLogUsuarios)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("ip_log_usuarios");

                entity.HasOne(d => d.IdUsuarioNavigation)
                    .WithMany(p => p.Logusuarios)
                    .HasForeignKey(d => d.IdUsuario)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("logusuarios_ibfk_1");
            });

            modelBuilder.Entity<Matricula>(entity =>
            {
                entity.HasKey(e => new { e.Id, e.IdAluno })
                    .HasName("PRIMARY")
                    .HasAnnotation("MySql:IndexPrefixLength", new[] { 0, 0 });

                entity.ToTable("matriculas");

                entity.HasCharSet("utf8mb4")
                    .UseCollation("utf8mb4_general_ci");

                entity.HasIndex(e => e.IdAluno, "id_aluno");

                entity.HasIndex(e => e.IdCurso, "id_curso");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .ValueGeneratedOnAdd()
                    .HasColumnName("id");

                entity.Property(e => e.IdAluno)
                    .HasColumnType("int(11)")
                    .HasColumnName("id_aluno");

                entity.Property(e => e.DataMatricula)
                    .HasColumnType("datetime")
                    .HasColumnName("data_matricula");

                entity.Property(e => e.IdCurso)
                    .HasColumnType("int(11)")
                    .HasColumnName("id_curso");

                entity.Property(e => e.IdParceiro)
                    .HasColumnType("int(11)")
                    .HasColumnName("id_parceiro")
                    .HasDefaultValueSql("'0'");

                entity.Property(e => e.Status)
                    .HasColumnType("tinyint(4)")
                    .HasColumnName("status");

                entity.HasOne(d => d.IdAlunoNavigation)
                    .WithMany(p => p.Matriculas)
                    .HasForeignKey(d => d.IdAluno)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("matriculas_ibfk_1");

                entity.HasOne(d => d.IdCursoNavigation)
                    .WithMany(p => p.Matriculas)
                    .HasForeignKey(d => d.IdCurso)
                    .HasConstraintName("matriculas_ibfk_2");
            });

            modelBuilder.Entity<Parceiro>(entity =>
            {
                entity.ToTable("parceiros");

                entity.HasCharSet("utf8mb4")
                    .UseCollation("utf8mb4_general_ci");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .HasColumnName("id");

                entity.Property(e => e.Bairro)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("bairro");

                entity.Property(e => e.Cep)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("cep");

                entity.Property(e => e.Cidade)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("cidade");

                entity.Property(e => e.Complemento)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("complemento");

                entity.Property(e => e.DataCadastro)
                    .HasColumnType("datetime")
                    .HasColumnName("data_cadastro");

                entity.Property(e => e.Email)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("email");

                entity.Property(e => e.Estado)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("estado");

                entity.Property(e => e.Logradouro)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("logradouro");

                entity.Property(e => e.NomeCompleto)
                    .IsRequired()
                    .HasMaxLength(200)
                    .HasColumnName("nome_completo");

                entity.Property(e => e.UltimaAtualizacao)
                    .HasColumnType("timestamp")
                    .HasColumnName("ultima_atualizacao")
                    .HasDefaultValueSql("current_timestamp()");

                entity.Property(e => e.Whatsapp)
                    .IsRequired()
                    .HasMaxLength(30)
                    .HasColumnName("whatsapp");
            });

            modelBuilder.Entity<Usuario>(entity =>
            {
                entity.ToTable("usuarios");

                entity.HasCharSet("utf8mb4")
                    .UseCollation("utf8mb4_general_ci");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .HasColumnName("id");

                entity.Property(e => e.Ativo)
                    .HasColumnType("tinyint(4)")
                    .HasColumnName("ativo")
                    .HasDefaultValueSql("'1'");

                entity.Property(e => e.DataCadastro)
                    .HasColumnType("datetime")
                    .HasColumnName("data_cadastro");

                entity.Property(e => e.IdEmpresa)
                    .HasColumnType("int(11)")
                    .HasColumnName("id_empresa")
                    .HasDefaultValueSql("'0'");

                entity.Property(e => e.IdParceiro)
                    .HasColumnType("int(11)")
                    .HasColumnName("id_parceiro")
                    .HasDefaultValueSql("'0'");

                entity.Property(e => e.LoginUsuario)
                    .IsRequired()
                    .HasMaxLength(100)
                    .HasColumnName("login_usuario");

                entity.Property(e => e.Senha)
                    .IsRequired()
                    .HasColumnName("senha");

                entity.Property(e => e.UltimoAcesso)
                    .HasColumnType("datetime")
                    .HasColumnName("ultimo_acesso");

                entity.Property(e => e.Usuariologado)
                    .HasColumnType("tinyint(4)")
                    .HasColumnName("usuariologado");
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
