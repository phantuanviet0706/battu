FROM openjdk:17

# Cài các dependency cần thiết
RUN apt-get update && \
    apt-get install -y \
        wget \
        xfonts-75dpi \
        xfonts-base \
        fontconfig \
        libfreetype6 \
        libjpeg62-turbo \
        libpng16-16 \
        libx11-6 \
        libxext6 \
        libxrender1 \
        libxtst6 \
        && rm -rf /var/lib/apt/lists/*

# Tải và giải nén wkhtmltopdf bản precompiled (static)
RUN wget https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.6/wkhtmltox-0.12.6-1-linux-generic-amd64.tar.xz && \
    tar -xJf wkhtmltox-0.12.6-1-linux-generic-amd64.tar.xz && \
    cp wkhtmltox/bin/wkhtmltopdf /usr/local/bin/ && \
    cp wkhtmltox/bin/wkhtmltoimage /usr/local/bin/ && \
    rm -rf wkhtmltox* 

# Copy app và setup khởi chạy
WORKDIR /app
COPY target/*.jar app.jar

ENTRYPOINT ["java", "-jar", "app.jar"]
