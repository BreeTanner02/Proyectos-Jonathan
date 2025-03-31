#!/bin/bash

# 1. Crear un grupo con el nombre del departamento
read -p "Introduce el nombre del grupo (departamento): " group_name
if [ -z "$group_name" ]; then
    echo "El nombre del grupo no puede estar vacío."
    exit 1
fi

# Crear el grupo
if sudo groupadd "$group_name"; then
    echo "Grupo '$group_name' creado con éxito."
else
    echo "Error al crear el grupo '$group_name'."
    exit 1
fi

# 2. Pedir cuántos usuarios crear
read -p "¿Cuántos usuarios deseas crear? " user_count
if ! [[ "$user_count" =~ ^[0-9]+$ ]]; then
    echo "Por favor, introduce un número válido."
    exit 1
fi

# Pedir el prefijo para los nombres de usuario
read -p "Introduce el prefijo para los nombres de usuario: " user_prefix
if [ -z "$user_prefix" ]; then
    echo "El prefijo no puede estar vacío."
    exit 1
fi

# Pedir la contraseña para todos los usuarios
read -sp "Introduce la contraseña para todos los usuarios (deja vacío para usar '12345'): " password
echo
if [ -z "$password" ]; then
    password="12345"
fi

# Crear usuarios automáticamente con el prefijo y numeración
for ((i = 1; i <= user_count; i++)); do
    user_name="${user_prefix}${i}"

    # Crear el usuario y asignarlo al grupo
    if sudo useradd -m -g "$group_name" -p "$(openssl passwd -crypt "$password")" "$user_name"; then
        echo "Usuario '$user_name' creado y añadido al grupo '$group_name'."
    else
        echo "Error al crear el usuario '$user_name'."
    fi
done