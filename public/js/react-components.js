const { useState, useEffect } = React;

// Componente Banner
function Banner({ position, imageUrl }) {
    const bannerStyle = {
        backgroundImage: `url(${imageUrl})`,
        backgroundSize: 'cover',
        backgroundRepeat: 'no-repeat',
        backgroundPosition: 'center',
        position: 'fixed',
        top: '0%',
        width: '320px',
        height: '100vh',
        textAlign: 'center',
        zIndex: 1000,
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center'
    };

    return <div style={bannerStyle} className={`banner-${position}`}></div>;
}

// Componente Footer
function Footer() {
    return (
        <footer style={{ backgroundColor: '#333', color: '#fff', textAlign: 'center', padding: '10px 0' }}>
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </footer>
    );
}

// Render de los componentes
function App() {
    const rootElement = document.getElementById('react-root');
    const leftBannerUrl = rootElement.getAttribute('data-left-banner');
    const rightBannerUrl = rootElement.getAttribute('data-right-banner');


    return (
        <div>
            <Banner position="left" imageUrl={leftBannerUrl} />
            <Banner position="right" imageUrl={rightBannerUrl} />
            <Footer />
        </div>
    );
}

ReactDOM.render(<App />, document.getElementById('react-root'));