FROM openjdk:17

# Cài các thư viện phụ thuộc và wkhtmltopdf
RUN apt-get update && \
    apt-get install -y \
        wget \
        gnupg \
        xfonts-75dpi \
        xfonts-base \
        fontconfig \
        libxrender1 \
        libjpeg62-turbo \
        libxtst6 \
        libpng-dev \
        libssl-dev && \
    wget https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.6/wkhtmltox_0.12.6-1.buster_amd64.deb && \
    dpkg -i wkhtmltox_0.12.6-1.buster_amd64.deb && \
    rm wkhtmltox_0.12.6-1.buster_amd64.deb && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY target/*.jar app.jar

ENTRYPOINT ["java", "-jar", "app.jar"]
